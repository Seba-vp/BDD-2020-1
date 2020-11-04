with open('artistas-obras-lugares.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
with open('ciudades-paises.csv', 'r', encoding='utf-8') as archivo2:
    lineas2 = archivo2.readlines()

l1 = []
lugares_id = 0
for linea in lineas:
    l = linea.split(';')
    for linea2 in lineas2:
        l2 = linea2.split(',')
        print('l '+l[14])
        print('l2 '+l2[0])
        if l[14].strip() == l2[0].strip():
            if [l[10],l[14].replace('\n', ""), l2[1], l2[2]] not in l1:
                l1.append([str(lugares_id),l[10],l[14].replace('\n', ""), l2[1], l2[2]])
                lugares_id += 1

l_p=['nombrelugar;nombreciudad;nombrepais;fonocontacto\n']
for t in l1:
    l_p.append(';'.join(t))
    #print(l2)
    print(l_p)
with open('Lugares.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)