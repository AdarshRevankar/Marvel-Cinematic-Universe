<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
    $database = "marvel";
    
	$card_split_1 = "<div class=\"card\"><div class=\"front side\" style=\"background-image: url('";
	$card_split_2 = '\')")>
                    <div class="content front-text">
                        <h1>';
	$card_split_3 = '</h1>
                    </div>
                </div>
            
                <div class="back side">
                    <div class="content back-text">
                        <h1>Skills</h1>
                        <ul>
                            <li>Energy
                                <div class="horizontal rounded">
                                        <div class="progress-bar horizontal">
                                            <div class="progress-track">
                                                <div class="progress-fill" style="width:';

    $card_split_4 =     '%;">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>Durability
                                <div class="horizontal rounded">
                                        <div class="progress-bar horizontal">
                                            <div class="progress-track">
                                                <div class="progress-fill" style="width:';
    $card_split_5 = '%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </li>
                            <li>Strength
                                <div class="horizontal rounded">
                                    <div class="progress-bar horizontal">
                                        <div class="progress-track">
                                            <div class="progress-fill" style="width: ';
    $card_split_6 = '%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <button ">&gt</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
	
	// Connection Handling
	$conn = new mysqli($servername, $username, $password, $database);
	if ($conn->connect_error) {
	    die("Connection failed: ".$conn->connect_error);
	}

	// Request an Query
	if(isset($_GET['search'])){
        $content = $_GET["search"];
        $query1 =   "SELECT c.id,name,char_desc,img_url,durability, strength, energy 
                    FROM characters c, skills s where c.id = s.id 
                    and upper(c.name) like upper('%".$content."%')";
    }
    else{
        $query1 =   "SELECT c.id,name,char_desc,img_url,durability, strength, energy 
                    FROM characters c, skills s where c.id = s.id";
    }
	$res_char = $conn->query($query1);
    
	// Show result to html
	if ($res_char->num_rows > 0) {
	    while($row = $res_char->fetch_assoc()) {
            echo $card_split_1
                .$row['img_url'].$card_split_2
                .$row['name'].$card_split_3
                .$row['durability'].$card_split_4
                .$row['strength'].$card_split_5
                .$row['energy'].$card_split_6;
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
?>