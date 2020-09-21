<?php
// Conectandose a la base de datos
// Encenderlo en xampp
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// Consiguiendo el mesaje por ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if(mysqli_num_rows($run_query) == 'help' || mysqli_num_rows($run_query) == 'ayuda' || mysqli_num_rows($run_query) == 'necesito ayuda'){
    echo "Aqui tienes la lista de mcomandos: <br /><br />-quien te creo?<br />-hola<br />-help";
} else {
    if(mysqli_num_rows($run_query) > 0){
        $fetch_data = mysqli_fetch_assoc($run_query);
        $replay = $fetch_data['replies'];
        echo $replay;
    }
    else {
            $rand = rand(1, 4);
            if($rand==1){
                echo "¡Lo siento pero no te entiendo!";
            } 
            if($rand==2){
                echo "...";
            }
            if($rand==3){
                echo "Intenta decir otra cosa";
            }
            if($rand==4){
                echo "Prueva a poner 'ayuda'";
            }
    }
}

?>