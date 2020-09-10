<?php

$files = array_diff(scandir("uploads/"), array('..', '.'));

function human_filesize($bytes, $dec = 2) 
{
    $size   = array('', 'k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y');
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

class VFile {
    // constructor
    public function __construct($filename) {
        $this->filename = $filename;
        $this->size = human_filesize(filesize("uploads/".$filename));
        $this->datemodified = filemtime("uploads/".$filename);
    }

	/*
	<tr>
		<th scope="row">1</th>
		<td>Mark</td>
		<td>Otto</td>
	</tr>
	*/
    public function get_entry() {
        echo "\t\t\t\t<tr>\n";
        echo "\t\t\t\t\t<td scope=\"row\">".$this->filename."</th>\n";
        echo "\t\t\t\t\t<td>".$this->size."</th>\n";
        echo "\t\t\t\t\t<td>".date("D M j G:i:s T Y",$this->datemodified)."</th>\n";
        echo "\t\t\t\t</tr>\n";
    }
}

?>
<html>
<head>
	<title>Valcora v0.1</title>
	<link rel="icon" href="icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="bootstrap.min.js"></script>
	
</head>
<body>
	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		
		    <a class="navbar-brand">
				<img src="icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
			</a>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link active" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="./usage.php">Usage</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="./upload.php">Upload</a>
			  </li>
			</ul>
		  </div>
		</nav>
	</div>
	<div class="container">
		<br>
		<span><em>
			<?php echo "Loaded ".(count($files)-1)." files"; ?>
		</em></p>
		<table class="table table-hover">
			<thead>
				<tr>
				  <th scope="col">Filename</th>
				  <th scope="col">Size</th>
				  <th scope="col">Last edited</th>
				</tr>
			</thead>
			<tbody>
<?php 
				foreach ($files as $file){
					if($file === "index.php"){
						continue;
					}
					$vfile = new VFile($file);
					$vfile->get_entry();
				}
?>
			</tbody>
		</table>
	</div>
</body>
</html>
