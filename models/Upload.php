<?php    



class Upload {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function uploadFile(array $file, $des)
    {
        extract($file);

        $file_name = $file['name'];
        $file_size = $file['size'];
        $file = $file['tmp_name'];
        $file_ext = strtolower(end(explode('.', $file['name'])));

        $extensions = array("jpeg", "jpg", "png", "pdf");

        if(in_array($file_ext, $extensions) === false){
            return [
                'status' => 'error',
                'message' => 'File extension not allowed. Please choose a different file.'
            ];
        }

        if($file_size > 2097152){
            return [
                'status' => 'error',
                'message' => 'File extension not allowed. Please choose a different file.'
            ];
        }

        $file_name = time() . "_" . explode(".", $file_name)[0] . "." . $file_ext;
        $file_path = $des . $file_name;

        if(move_uploaded_file($file, $file_path)){
            return [
                'status' => 'success',
                'message' => 'File uploaded successfully.',
                'file_name' => $file_name
            ];
        }
        else{
            return [
                'status' => 'error',
                'message' => 'File upload failed.'
            ];
        }
    }

    public function uploadToDB($userid, $filename, $kind)
    {
        if(is_array($filename)) {
            $files = json_encode($filename);
        }
        else {
            $files = json_encode([$filename]);
        }

        $query = "INSERT INTO `uploads`(`user_id`, `service_id`, `files`) VALUES (:userid, :kind, :filename)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userid' => $userid,
            'kind' => $kind,
            'filename' => $files
        ]);

        if($result) return true;
        else return false;
    }

    public function getUserUploads($userId)
    {
        $query = "SELECT * FROM `uploads` WHERE `user_id` = :userid";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userid' => $userId
        ]);

        if($result) return $result->fetchAll();
        else return false;
    }
    
}