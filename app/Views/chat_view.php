
<div id="contenu">
    <h1 class="chat_h1">Discussions entre joueurs</h1>
    <div class="chat_div">
    <?php foreach ( $lesmessages as $un):?>
            <p class="chat_p"><strong><?php echo stripslashes($un['pseudo']) ?></strong> : <?php echo stripslashes($un['message']) ?><br></p>
    <?php endforeach;?>
        <form method="post" action="<?php echo base_url()?>/Chat/dire">
            <input class="chat_input"type="text" name="pseudo" id="pseudo" placeholder="Pseudo" /><br/>
            <textarea class="chat_text" type="fiels" name="message" id="message" placeholder="Message"></textarea><br/>
            <input style="margin-left: 0px;" class="chat_input" type="submit" name="Envoyer" id="envoyer" /><br/>
        </form>
        <a class="chat_refresh" href="<?php echo base_url()?>/Chat">Actualiser</a>
    </div>
    </div>
