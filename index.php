<?php
$show_detail = FALSE;

if (isset($_GET['rid'])) {
    $reference_id = $_GET['rid'];

    $result  = [];
    if (($handle = fopen("users.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // echo "reference_id = " . $reference_id;
            // echo "<br>";
            // echo "data[0] = " . $data[0];
            // echo "<hr>";
            if ($data[0] === $reference_id) {
                $show_detail = TRUE;
                $result = $data;
                break;
            }
        }
        fclose($handle);
        // var_dump($result);
        $certificate_number = $result[1];
        $name = $result[2];
        $designation = $result[3];
        $company = $result[4];
        $internship_type = $result[5];
        $performance = $result[6];
        $duration = $result[7];
        $team_leader = $result[8];
        $remark = $result[9];
        $avatar = ($result[10] == '') ? "https://i.stack.imgur.com/34AD2.jpg" : $result[10];
    }
}
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .inf-content {
            border: 1px solid #DDDDDD;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container bootstrap snippet">
        <h1>Cerificate Details</h1>
        <div class="panel-body inf-content">
            <div class="row">
                <?php
                if ($show_detail) {
                ?>
                    <div class="col-md-3 text-center">
                        <!-- <img alt="" style="width:250px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> -->
                        <img alt="" style="width:250px;height:250px;" title="" class="img-circle img-thumbnail isTooltip" src="<?php echo $avatar; ?>" data-original-title="Usuario">
                    </div>
                    <div class="col-md-9">
                        <strong>Information</strong><br>
                        <div class="table-responsive">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td><strong>Certificate Number</strong></td>
                                        <td class="text-primary"><?php echo $certificate_number; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td class="text-primary"><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Designation</strong></td>
                                        <td class="text-primary"><?php echo $designation; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Company</strong></td>
                                        <td class="text-primary"><?php echo $company; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Internship Type</strong></td>
                                        <td class="text-primary"><?php echo $internship_type; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Performance</strong></td>
                                        <td class="text-primary"><?php echo $performance; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Duration</strong></td>
                                        <td class="text-primary"><?php echo $duration; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Team Leader</strong></td>
                                        <td class="text-primary"><?php echo $team_leader; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Remark</strong></td>
                                        <td class="text-primary"><?php echo $remark; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-md-12 text-center">
                        Invalid Certificate!
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>