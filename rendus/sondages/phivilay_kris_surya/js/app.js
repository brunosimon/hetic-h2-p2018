$(document).ready(function(){

    var $vote = $('#vote');
    $('.vote_like', $vote).click(function(e){
        e.preventDefault();
        vote(1, 'like.php');
    });
    $('.vote_dislike', $vote).click(function(e){
        e.preventDefault();
        vote(-1, 'like.php');
    });
    $('.vote_star', $vote).click(function(e){
        e.preventDefault();
        vote($(this).data('score'), 'vote.php')
    })

    function vote(value, url){
        $('.vote_loading', $vote).show();
        $('.vote_btns', $vote).hide();
        $.post(url, {
            ref: $vote.data('ref'),
            ref_id: $vote.data('ref_id'),
            vote: value
        }).done(function(data, textStatus, jqXHR){
            $('#dislike_count').text(data.dislike_count);
            $('#like_count').text(data.like_count);
            $vote.removeClass('is-liked is-disliked is-score1 is-score2 is-score3 is-score4 is-score5');
            if(data.success){
                if(data.score){
                    // On vote
                    $vote.addClass('is-score' + Math.round(data.score));
                } else {
                    // On like / Dislike
                    if(value == 1){
                        $vote.addClass('is-liked');
                    } else{
                        $vote.addClass('is-disliked');
                    }
                    var percentage = Math.round(100 * (data.like_count / (parseInt(data.dislike_count) + parseInt(data.like_count))));
                    $('.vote_progress', $vote).css('width', percentage + '%');
                }
            }
        }).fail(function( jqXHR, textStatus, errorThrown ) {
            alert(jqXHR.responseText);
        }).always(function(){
            $('.vote_loading', $vote).hide();
            $('.vote_btns', $vote).fadeIn();
        });
    }

})