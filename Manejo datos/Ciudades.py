with open('ciudades-paises.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
l1 = []
ciudad_id = 0
for linea in lineas:
    l = linea.split(',')
    if [l[0].replace("\ufeff", ""),l[1],l[2]] not in l1:
        l1.append([str(ciudad_id),l[0].replace("\ufeff", ""),l[1],l[2]])
        ciudad_id += 1
l_p=[]
for l2 in l1:
    l_p.append(';'.join(l2))
    print(l2)

with open('Ciudades.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)