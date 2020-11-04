with open('artistas-obras-lugares.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
l1 = []
plaza_id = 0
for linea in lineas:
    l = linea.split(';')
    if l[11] == '' and l[12] == '' and l[13] == '':
        if [l[10]+'\n'] not in l1:
            l1.append([str(plaza_id),l[10]+'\n'])
            plaza_id += 1
l_p=[]
for l2 in l1:
    l_p.append(';'.join(l2))
    print(l2)
    print(l_p)
with open('Plazas.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)