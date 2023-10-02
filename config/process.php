<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    // MODIFICAÇÃO NO BANCO 
    if(!empty($data)){

        //CRIAR CONTATO
        if($data["type"] === "create") {

            $name = $data["name"];
            $email = $data["email"];
            $phone = $data["phone"];
            $observations = $data["observations"];
      
            $query = "INSERT INTO contacts (name, email, phone, observations) VALUES (:name, :email, :phone, :observations)";
      
            $stmt = $conn->prepare($query);
      
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato criado com sucesso!";
            
              } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
              }

        } else if ($data["type"] === "edit") {

            $name = $data["name"];
            $email = $data["email"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $query = "UPDATE contacts
                        SET name = :name, email = :email, phone = :phone, observations = :observations
                        WHERE id = :id";
  

            $stmt = $conn->prepare($query);
      
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso !";
            
              } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
              }

        }else if($data["type"] === "delete") {
            
            $id = $data["id"];

            $querry = "DELETE FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($querry);

            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();
                $_SESSION["msg"] = "Contato removido com sucesso!";
            
              } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
              }

        }

        // REDIRECIONAMENTO
        header("location:" .  $BASE_URL ."../index.php");

        // SELEÇÃO DE DADOS
    } else {

        $id;

        if(!empty($_GET["id"])){
            $id = $_GET["id"];
        }

        // RETORNA O DADO DE UM  CONTATO
        if(!empty($id)){

            $querry = "SELECT * FROM contacts WHERE id = :id";

            $stmt = $conn->prepare($querry);

            $stmt->bindParam("id", $id);

            $stmt->execute();

            $contact = $stmt->fetch();

        }else {
            // RETORNA TODOS OS CONTATOS
            $contacts = [];
            $querry = "SELECT * FROM contacts";

            $stmt = $conn->prepare($querry);

            $stmt->execute();

            $contacts = $stmt->fetchAll();
        }
    }
    

    // FECHANDO CONEXÃO
    $conn = null;