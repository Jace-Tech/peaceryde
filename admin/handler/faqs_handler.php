<?php
require_once("./models.php");

$faqs = new FAQs($connect);

if(isset($_POST['add'])) {
    $question = filter_field($_POST['question']);
    $answer = filter_field($_POST['answer']);
    $tags = filter_field($_POST['tags']);

    $result = $faqs->add_question($question, $answer, $tags);

    if($result) {
        setAdminAlert("FAQ added", 'success');
        header('location: ../faqs.php');
    }

    else{
        setAdminAlert("Something went wrong, please try again", 'error');
        header('location: ../faqs.php');
    }
}

if(isset($_POST['delete'])){
    $id = $_POST['delete'];

    $result = $faqs->delete_question($id);
    if($result){
        setAdminAlert( "Question deleted successfully",'success');
        header('Location: ../faqs.php');
    }
    else {
        setAdminAlert("Something went wrong. Please try again", 'error');
        header('Location: ../faqs.php');
    }
}


if(isset($_POST['edit'])){
    $id = $_POST['faq_id'];
    $answer = filter_field($_POST['answer']);
    $question = filter_field($_POST['question']);

    $result = $faqs->update_question($question, $answer, $id);
    if($result){
        setAdminAlert("Question updated successfully", 'success');
        header('Location: ../faqs.php');
    }
    else {
        setAdminAlert( "Something went wrong. Please try again", 'error');
        header('Location: ../faqs.php');
    }
}

