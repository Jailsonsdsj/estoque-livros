#insert into livros (idlivros,titulo,autor,preco,paginas,isbn,id_genero,id_editora,id_tipo,imagem,estoque) VALUES

resp = 1
e = 0
i = 0
cadastro = list()
dados = dict()

print("CADASTRO DE LIVROS EM LOTE")
while resp == 1:
    print("\n--------------------------------\n")
    dados['idlivros'] = "(null,"
    dados['titulo'] = "'" + str(input("Título: ")) + "',"
    dados['autor'] = "'" + str(input("Autor: ")) + "',"
    dados['preco'] = str(input("Preço: ")) + ","
    dados['paginas'] = str(input("Quantidade de Páginas: ")) + ","
    dados['isbn'] = "'" + str(input("ISBN: ")) + "',"
    dados['id_genero'] = str(input("ID Gênero: ")) + ","
    dados['id_editora'] = str(input("ID Editora: ")) + ","
    dados['id_tipo'] = str(input("ID Tipo: ")) + ","
    dados['imagem'] = "'img\livros" + str(input("Nome da Imagem: ")) + ".jpg',"
    dados['estoque'] = str(input("Quantidade em Estoque: ")) + ")"

    cadastro.append(dados.copy())
    dados.clear()

    print("--------------------------------")
    resp = int(input("Deseja adicionar mais dados? \n 1 - Sim \n 2 - Não\n"))
    if resp == 2:
        break

print("\n\n--------------------------------")
print("EXIBIÇÃO DOS DADOS: \n")
for e in cadastro:
    print("", end="")
    for i in e.values():
        print(f'{i}', end="")
    print(",")
