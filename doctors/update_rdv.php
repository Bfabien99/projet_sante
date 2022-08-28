<?php
if (isset($_POST['input']) && isset($_POST['type'])) {
    include('../includes/config.php');
    include('../includes/functions.php');
    include('../mail.php');
    $db = connect(
        DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        DB_NAME
    );

    $rdv = getRdv($_POST['input']);

    if($rdv){
        $user = getUserbyId($rdv['user_id']);
        $docteur = getDoctorbyId($rdv['doctor_id']);
    
    if($_POST['type'] == "remove"){
        if(undoRdv(escapeString($_POST['input']))){
            sendMail('Rendez-vous Annulé','Votre rendez-vous du '.date('d/m/Y - H:i',strtotime($rdv['date']))." vient d'être annulé car le docteur ".strtoupper($docteur['first_name'])." ".strtoupper($docteur['last_name'])." sera indisponible",$user['email']);
        };
        return true;
    }
    if($_POST['type'] == "confirm"){
        if(confirmRdv(escapeString($_POST['input']))){
            sendMail('Rendez-vous Confirmé','Votre rendez-vous du '.date('d/m/Y - H:i',strtotime($rdv['date']))." vient d'être confirmé par le docteur ".strtoupper($docteur['first_name'])." ".strtoupper($docteur['last_name']),$user['email']);
        };
        return true;
    }
    if($_POST['type'] == "done"){
        if(confirmConsultation(escapeString($_POST['doctor']),escapeString($_POST['user']))){
            if(cancelRdv(escapeString($_POST['input']))){
                sendMail('Rendez-vous effectué',"Merci d'être passé voir le Docteur ".strtoupper($docteur['first_name']) . " " . strtoupper($docteur['last_name']), $user['email']);
            };
            return true;
        }else{
            return false;
        }
        
    }
}else{
    return false;
}

}
?>