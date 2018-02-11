<?php
    require_once('src/model/Session.php');
    require_once('src/model/User.php');
    require_once('src/model/SelectionDate.php');
    require_once('src/view/MainTemplates.php');

    $session = new Session();
    $session->start();

    MainTemplates::echoMainHeader();

    if ($session->isLoggedIn()) {
       if (isset($_POST['recipient']) && $_POST['recipient'] != '') {
          $recipient = $_POST['recipient'];
          $title = '';
          $body = '';

          if ($_POST['mailtype'] == 'notification') {
            $title = 'Notification';
            $remainingDays = date('t') - date('j');
            $body = '<p>Just a friendly reminder that you only have '.$remainingDays.' days left to select what’s best, and post it to <a href="http://'.str_replace('/admin.php', '', $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']).'">Must</a>.</p><p><i>Sent by a robot.</i></p>';
          }
          elseif ($_POST['mailtype'] == 'summary') {
            $title = 'Summary for Last Selection';
            $date = SelectionDate::previousDateIdentifier();
            $usernames = array('Tast', 'Terenn');
            foreach ($usernames as $username) {
              $user = new User($username);
              if (isset($user->selections->$date)) {
                $body .= '<h2>'.$username.'</h2><ul>';
                foreach ($user->selections->$date as $selection) {
                  $body .= '<li><a href="'.$selection->playURL.'">'.$selection->title.'</a>, by '.$selection->artist.'</li>';
                }
                $body .= '</ul></p>';
              }
            }
            $body .= '<p>>> <a href="http://'.str_replace('/admin.php', '', $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']).'">Must</a></p>';
          }

          $headers  = 'MIME-Version: 1.0'."\r\n";
          $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
          $headers .= 'From: Must <me@vtourraine.net>'."\r\n";

          if (mail($recipient, '[Must] '.$title, $body, $headers)) {
              echo 'Email sent to '.$recipient.'.';
          }
          else {
              echo 'Error sending email.';
          }
      }
?>
      <section class="edit">
       <h2>Mailer</h2>
       <form method="POST">
          <div>
             <label for="recipient">Recipient: </label>
             <input type="email" name="recipient" id="recipient"/>
         </div>
         <div>
             <label for="mailtype">Email type: </label>
             <select name="mailtype" id="mailtype">
                <option value="notification">Notification (Next Selection)</option>
                <option value="summary">Summary (Last Selection)</option>
            </select>
        </div>
        <div>
         <input type="submit" value="Send Email" />
     </div>
    </form>
    </section>
<?php
    }

    MainTemplates::echoMainFooter();
?>