from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os

MESSAGE_KEYS = ['date', 'lat', 'long', 'message', 'receptant', 'sender']

# conexión para bd local
'''MONGODATABASE = "test"
MONGOSERVER = "localhost"
MONGOPORT = 27017
client = MongoClient(MONGOSERVER, MONGOPORT)
mongodb = client[MONGODATABASE]

usuarios = mongodb.users
mensajes = mongodb.messages'''

# conexión bd remota
USER = "grupo51"
PASS = "grupo51"
DATABASE = "grupo51"
URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}?authSource=admin"
client = MongoClient(URL)
db = client["grupo51"]

usuarios = db.users
mensajes = db.messages

# Iniciamos la aplicación de flask
app = Flask(__name__)

@app.route("/")
def home():
    '''
    Página de inicio
    '''
    return json.jsonify({"Saludo": "Hola"})

@app.route("/messages")
def get_messages():

    id1 = int(request.args.get('id1', False))
    id2 = int(request.args.get('id2', False))
    if id1 and id2:
        user1 = list(usuarios.find({"uid": id1}, {"_id": 0}))
        user2 = list(usuarios.find({"uid": id2}, {"_id": 0}))
        if len(user1)==0 or len(user2)==0:
            return json.jsonify({"Error": "usuario inexistente"})

        messages_id1 = list(mensajes.find({"$and": [{"sender": id1}, {"receptant": id2}]}, {"_id": 0}))
        messages_id2 = list(mensajes.find({"$and": [{"sender": id2}, {"receptant": id1}]}, {"_id": 0}))
        mensajes_id1 = [message for message in messages_id1]
        mensajes_id2 = [message for message in messages_id2]
        return json.jsonify(mensajes_id1 + mensajes_id2)
    else:
        resultados = list(mensajes.find({}, {"_id": 0}))
        return json.jsonify(resultados)

@app.route("/messages/<int:mid>")
def get_message(mid):
    
    mensaje = list(mensajes.find({"mid": mid}, {"_id": 0}))
    if len(mensaje)==0:
        return json.jsonify({"Error": "mensaje inexistente"})
    return json.jsonify(mensaje)

@app.route("/users")
def get_users():
    '''
    Obtiene todos los usuarios
    '''
    # Omitir el _id porque no es json serializable
    resultados = list(usuarios.find({}, {"_id": 0}))
    return json.jsonify(resultados)

@app.route("/users/<int:uid>")
def get_user(uid):
    '''
    Obtiene el usuario de id entregada
    '''
    user = list(usuarios.find({"uid": uid}, {"_id": 0}))
    if len(user)==0:
        return json.jsonify({"Error": "usuario inexistente"})
    messages = list(mensajes.find({"sender": uid}, {"_id": 0}))
    for i in range(len(user)):
        user[i]["messages"] = [message for message in messages]

    return json.jsonify(user)

@app.route("/text-search")
def search():
    try:
        body = request.json
    except:
        body = None
    if body:
        if len(body)==0:
            resultados = list(mensajes.find({}, {"_id": 0}))
            return json.jsonify(resultados)
        else:
            deseables = body.get("desired", [])
            requeridas = body.get("required", [])
            prohibidas = body.get("forbidden", [])
            uid = body.get("userId", "")

            palabras_deseables = ""
            for frase in deseables:
                palabras_deseables += frase
                palabras_deseables += " "
            palabras_deseables = palabras_deseables.strip()

            frases_requeridas = ""
            for frase in requeridas:
                frase_entera = "\""+frase+"\" "
                frases_requeridas += frase_entera
            frases_requeridas = frases_requeridas.strip()

            palabras_prohibidas = ""
            palabras_prohibidas_sin_negacion = ""
            for palabra in prohibidas:
                palabra_entera = "-" + palabra + " "
                palabra_entera_sin_negacion = palabra + " "
                palabras_prohibidas += palabra_entera
                palabras_prohibidas_sin_negacion += palabra_entera_sin_negacion
            palabras_prohibidas = palabras_prohibidas.strip()
            palabras_prohibidas_sin_negacion = palabras_prohibidas_sin_negacion.strip()

            busqueda = ((palabras_deseables + " " + frases_requeridas).strip() + " " + palabras_prohibidas).strip()

            if uid=="":
                if busqueda == "":
                    resultado = list(mensajes.find({}, {"_id": 0}))
                elif palabras_deseables=="" and frases_requeridas=="":
                    mensajes_prohibidos = list(mensajes.find({"$text": {"$search": palabras_prohibidas_sin_negacion}},{"_id": 0}))
                    mensajes_totales = list(mensajes.find({}, {"_id": 0}))
                    mensajes_no_prohibidos = [val for val in mensajes_totales if val not in mensajes_prohibidos]
                    resultado = mensajes_no_prohibidos
                else:
                    resultado = list(mensajes.find({"$text": {"$search": busqueda}},{"_id": 0}))
            else:
                if busqueda == "":
                    resultado = list(mensajes.find({"sender": int(uid)}, {"_id": 0}))
                elif palabras_deseables=="" and frases_requeridas=="":
                    mensajes_prohibidos = list(mensajes.find({"$text": {"$search": palabras_prohibidas_sin_negacion}},{"_id": 0}))
                    mensajes_totales = list(mensajes.find({"sender": int(uid)}, {"_id": 0}))
                    mensajes_no_prohibidos = [val for val in mensajes_totales if val not in mensajes_prohibidos]
                    resultado = mensajes_no_prohibidos
                else:
                    resultado = list(mensajes.find({"$and": [{"$text": {"$search": busqueda}},{"sender": int(uid)}]},{"_id": 0}))
            return json.jsonify(resultado)
    else:
        resultados = list(mensajes.find({}, {"_id": 0}))
        return json.jsonify(resultados)

@app.route("/messages", methods=['POST'])
def create_message():
    try:
        body = request.json
    except:
        body = None
    if body:
        date = body.get("date", False)
        lat = body.get("lat", False)
        longitud = body.get("long", False)
        message = body.get("message", False)
        receptant = body.get("receptant", False)
        sender = body.get("sender", False)
        if date and lat and longitud and message and receptant and sender:
            messages = list(mensajes.find({}, {"_id": 0}))
            mids = [int(message["mid"]) for message in messages]
            mid = max(mids) + 1
            data = {key: request.json[key] for key in MESSAGE_KEYS}
            data["mid"] = mid
            result = mensajes.insert_one(data)
            return json.jsonify(["mensaje "+str(mid)+" insertado con éxito"])
        else:
            mensaje_error = "Faltan los siguientes atributos: "
            campos = [date,lat,longitud,message,receptant,sender]
            for i in range(len(campos)):
                if not campos[i]:
                    mensaje_error += MESSAGE_KEYS[i]
                    mensaje_error += ", "
            mensaje_error = mensaje_error.strip(", ")
            return json.jsonify({"Error": mensaje_error})
    else:
        return json.jsonify({"Error": "No se han ingresado atributos"})


@app.route("/message/<int:mid>", methods=['DELETE'])
def delete_message(mid):
    message = list(mensajes.find({"mid": mid}, {"_id": 0}))
    if len(message)==0:
        return json.jsonify({"Error": "mensaje inexistente"})
    else:
        mensajes.remove({"mid": mid})
        return json.jsonify(["Mensaje "+str(mid)+" removido exitosamente"])

if __name__ == "__main__":
    app.run(debug=True)
