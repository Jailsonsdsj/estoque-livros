
/*
QUERY PARA EXIBIÇÃO DE LIVROS NO SITE:
*/

select l.titulo as "Título", l.autor as "Autor", g.nome as "Gênero", e.nome as "Editora", t.nome as "Tipo", l.preco as "Preço"
from livros l 
inner join genero g on l.id_genero = g.idgenero 
inner join editora e on l.id_editora = e.ideditora 
inner join tipo t on l.id_tipo = t.idtipo;


/*
QUERY PARA CADASTRAR LIVROS
*/

insert into livros (idlivros,titulo,imagem,autor,preco,paginas,isbn,id_genero,id_editora,id_tipo,estoque) VALUES COMPLEMENTO_DO_ALGORITMO
