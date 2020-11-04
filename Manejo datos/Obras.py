with open('artistas-obras-lugares.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
l1 = []
obras_id = 0
for linea in lineas:
    l = linea.split(';')
    if [l[4],l[0].replace("\ufeff", ""),l[7],l[5],l[6], l[10]+'\n'] not in l1:
        l1.append([str(obras_id),l[4],l[0].replace("\ufeff", ""),l[7],l[5],l[6], l[10]+'\n'])
        obras_id += 1
l_p=[]
for l2 in l1:
    l_p.append(';'.join(l2))
    print(l2)
    print(l_p)
with open('Obras.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)