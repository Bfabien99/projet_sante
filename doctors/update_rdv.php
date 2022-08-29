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

    if ($rdv) {
        $user = getUserbyId($rdv['user_id']);
        $docteur = getDoctorbyId($rdv['doctor_id']);

        if ($_POST['type'] == "remove") {
            undoRdv(escapeString($_POST['input']));
            $objet = "RENDEZ-VOUS ANNULE";
            $message = "Votre rendez-vous du <strong>".date('d/m/Y - H:i', strtotime($rdv['date_rdv'])) . "</strong> vient d'être annulé car <strong> Dr ".strtoupper($docteur['first_name'])." ".strtoupper($docteur['last_name'])." sera indisponible</strong>
            ";
            sendMail($objet,$message,$user['email']);
            return true;
        }
        if ($_POST['type'] == "confirm") {
            confirmRdv(escapeString($_POST['input']));
            $objet = "RENDEZ-VOUS CONFIRME";
            $message = "Votre rendez-vous du <strong>". date('d/m/Y - H:i', strtotime($rdv['date_rdv'])) . "</strong> avec <strong>Dr ".strtoupper($docteur['first_name'])." ".strtoupper($docteur['last_name'])." vient d'être confirmé </strong>";
            sendMail($objet,$message, $user['email']);
            return true;
        }
        if ($_POST['type'] == "done") {
                confirmConsultation(escapeString($_POST['doctor']), escapeString($_POST['user']));
                cancelRdv(escapeString($_POST['input']));
                $objet = "MERCI D'ÊTRE PASSE";
                $message = "Merci d'être passé voir <strong>Dr ".strtoupper($docteur['first_name'])." ".strtoupper($docteur['last_name'])."</strong>";
                sendMail($objet,$message, $user['email']);
                return true;
        }
    } else {
        return false;
    }
}
