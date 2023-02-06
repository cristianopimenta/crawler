<?php

class ModelPerfil
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function saveProfile($name, $github_url)
    {
        $sql = "INSERT INTO profiles (name, github_url) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $name, $github_url);
        $stmt->execute();
        $stmt->close();
    }

    public function getProfiles($name = '')
    {
        $sql = "SELECT * FROM profiles";
        if (!empty($name)) {
            $sql .= " WHERE name LIKE '%$name%'";
        }
        $result = $this->db->query($sql);
        $profiles = [];
        while ($row = $result->fetch_assoc()) {
            $profiles[] = $row;
        }
        return $profiles;
    }
}
