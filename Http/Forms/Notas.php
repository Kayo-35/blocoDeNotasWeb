<?php
namespace Http\Forms;
use Base\Validator;

class Notas
{
    protected string $title;
    protected array $tags = [];
    protected string $body;
    protected object $db;

    public function __construct(object $db)
    {
        $this->db = $db;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle($title): mixed
    {
        if (Validator::title(strlen($title),50) === null) {
            return null;
            $this->title = "Sem título";
        }
        elseif(Validator::title(strlen($title),50) === false) {
            return false;
        }
        $this->title = $title;
        return true;
    }
    public function getBody(): string
    {
        return $this->body;
    }
    public function setBody($body): bool
    {
        if (!Validator::string(strlen($body), 1, 4000)) {
            return false;
        }
        $this->body = $body;
        return true;
    }
    public function getTags(): array
    {
        return $this->tags;
    }
    public function setTags($tags): bool
    {
        if (!Validator::qtItens($tags, 3, 0)) {
            return false;
        }
        $this->tags = $tags;
        return true;
    }
    //Permanência de dados
    //Store nota
    public function storeNote(int $id_user): void
    {
        $this->db->connect();
        $query =
            "INSERT INTO notas(id_user,title,body,dt_nota) VALUES(:id,:title,:body,:dt_nota);";
        $this->db->exec($query, [
            "id" => $id_user,
            "title" => $this->title,
            "body" => $this->body,
            "dt_nota" => date("Y-m-d"),
        ]);
    }
    public function getLatestNote() : int {
        return $this->db->exec("SELECT MAX(id_nota) as id FROM notas;")->find()['id'];
    }
    //Tags
    public function getTagList(): array
    {
        $this->db->connect();
        $tags = $this->db->exec("SELECT id_tag,nm_tag FROM tag;")->findAll();
        if (!isset($tags)) {
            return [];
        } else {
            return $tags;
        }
    }
    public function storeTags(): void
    {
        $this->db->connect();
        $id_nota = $this->getLatestNote();
        $query =
            "INSERT INTO notas_tags(id_nota,id_tag) VALUES (:id_nota,:id_tag)";
        foreach ($this->tags as $tag) {
            $this->db->exec($query,[
                "id_nota" => $id_nota,
                "id_tag" => $tag,
            ]);
        }
    }
}
