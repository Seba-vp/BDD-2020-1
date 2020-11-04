with open('artistas-obras-lugares.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
l1 = []
pinturas_id = 0
for linea in lineas:
    l = linea.split(';')
    if l[8] != '':
        if [l[4],l[8]+'\n'] not in l1:
            l1.append([str(pinturas_id),l[4],l[8]+'\n'])
            pinturas_id += 1
l_p=[]
for l2 in l1:
    l_p.append(';'.join(l2))
    print(l2)
    print(l_p)
with open('Pinturas.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)