<?php  

class ArticleModel
{

    public function read(): array{

        $req = ("SELECT 
                    a.id          AS a_id, 
                    a.title       AS a_title, 
                    a.textContent AS a_textContent, 
                    a.category    AS a_category, 
                    a.page        AS a_page,
                    c.name        AS c_name,
                    c.id          AS c_id,
                    p.name        AS p_name,
                    p.id          AS p_id

                FROM 
                    article a,
                    category c,
                    page p
                WHERE
                    c.id = a.category
                AND
                    p.id = a.page    
                ");

        $res = $this::$conn->query($req);

        while ($row = $res->fetch(PDO::FETCH_OBJ)) { 

            $this->article = new Article(
                $row->a_id, 
                new TextElement($row->a_title),
                new TextElement($row->a_textContent),
                new Category   ($row->c_id, new TextElement($row->c_name)),
                new Page       ($row->p_id, new TextElement($row->p_name))
            );

            $articles[$row->a_id] = $this->article;
        }
        return $articles;
    }
}

?>