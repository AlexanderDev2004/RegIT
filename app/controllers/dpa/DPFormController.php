<?php
// Nanti akan dibuat controller dari table dpa
require_once './app/models/dpa/DPFormModel.php';
require_once __DIR__ . '/../Controller.php';

class DPFormController extends Controller {

    private $model;

    public function __construct() {
        $this->model = new DPFormModel();
    }

    public function index() {
        // Data dari database untuk ditampilkan di form (opsional)
        $data = $this->model->getAll();
        require_once './app/views/dpa/formDPA.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input
            if (empty($_POST['nim']) || empty($_POST['angkatan']) || empty($_POST['kelas'])) {
                echo "Please fill out all fields."; 
                return;
            }

            // Handle file upload (photo evidence)
            if (isset($_FILES['foto_bukti']) && $_FILES['foto_bukti']['error'] == UPLOAD_ERR_OK) {
                $uploadedFile = $_FILES['foto_bukti'];
                // You can move the uploaded file to the server's directory
                $targetDir = 'uploads/'; // Specify your file upload directory
                $fileName = basename($uploadedFile['name']);
                $targetFilePath = $targetDir . $fileName;
                move_uploaded_file($uploadedFile['tmp_name'], $targetFilePath);
            } else {
                $targetFilePath = null;
            }

            // Prepare data for insertion
            $data = [
                'nim' => $_POST['nim'],
                'angkatan' => $_POST['angkatan'],
                'kelas' => $_POST['kelas'],
                'tanggal_pelanggaran' => $_POST['tanggal_pelanggaran'],
                'pelanggaran' => $_POST['pelanggaran'],
                'foto_bukti' => $targetFilePath, // Path to the uploaded photo
                'sanksi' => $_POST['sanksi'],
                'status_pelanggaran' => $_POST['status_pelanggaran']
            ];
            
            // Insert data into the model
            $this->model->insert($data);
            
            // Redirect to success or some other page
            header("Location: /dpa/success");
            exit();
        }
    }
}
