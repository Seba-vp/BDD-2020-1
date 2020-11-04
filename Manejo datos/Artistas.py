with open('artistas-obras-lugares.csv', 'r', encoding='utf-8') as archivo:
    lineas = archivo.readlines()
l1 = []
artista_id = 0
for linea in lineas:
    l = linea.split(';')
    if [l[0].replace("\ufeff", ""),l[1],l[2],l[3]+'\n'] not in l1:
        l1.append([str(artista_id), l[0].replace("\ufeff", ""),l[1],l[2],l[3]+'\n'])
        artista_id += 1
l_p=[]
for l2 in l1:
    l_p.append(';'.join(l2))
    print(l2)
    print(l_p)
with open('Artistas.csv', 'w', encoding='utf-8') as archivo:
    archivo.writelines(l_p)