?php
 
require_once "GridModel.php";
 
class GridController
{
 
    public function dashboard()
    {
        $model = new GridModel();
 
        $farms = $model->getFarms();
 
        $requests = $model->getRequests();
 
        include "views/dashboard.php";
    }
 
 
    public function energy()
    {
        $model = new GridModel();
 
        $energy = $model->getEnergy();
 
 
        $netFlow =
            $energy["total_received"]
            -
            $energy["total_distributed"];
 
 
        if ($energy["grid_load"] >= 80) {
 
            $status = "High Load";
 
        }
        else if ($energy["grid_load"] >= 60) {
 
            $status = "Stable";
 
        }
        else {
 
            $status = "Low Load";
        }
 
 
        include "views/energy.php";
    }
 
 
    public function accept()
    {
        $model = new GridModel();
 
        if (isset($_GET["id"])) {
 
            $id = $_GET["id"];
 
            $model->acceptRequest($id);
        }
 
        header("Location: index.php");
    }
 
 
    public function reject()
    {
        $model = new GridModel();
 
        if (isset($_GET["id"])) {
 
            $id = $_GET["id"];
 
            $model->rejectRequest($id);
        }
 
        header("Location: index.php");
    }
}
 
?>
 