function showComment(commentId){
    let commentBox = document.querySelector("#comment-box-" + commentId);
    commentBox.className = "comment-box comment-box-none";

    commentBox.querySelector(".comment").className = "comment comment-none";
    commentBox.querySelector(".hate-comment-warning").className = "hate-comment-warning hate-comment-warning-none";
    
}
function hideComment(commentId){
    let commentBox = document.querySelector("#comment-box-" + commentId);
    commentBox.className = "comment-box comment-box-hate";

    commentBox.querySelector(".comment").className = "comment comment-hate";
    commentBox.querySelector(".hate-comment-warning").className = "hate-comment-warning hate-comment-warning-hate";
    
}