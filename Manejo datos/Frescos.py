with open('artistas-obras-lugares.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
l1 = []
frescos_id = 0
for linea in lineas:
    l = linea.split(';')
    if l[8] == '' and l[9]== '':
        if [l[4]+'\n'] not in l1:
            l1.append([str(frescos_id),l[4]+'\n'])
            frescos_id += 1
l_p=[]
for l2 in l1:
    l_p.append(';'.join(l2))
    print(l2)
    print(l_p)
with open('Frescos.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)