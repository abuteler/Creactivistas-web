<?php
// header('Access-Control-Allow-Origin: *');

$questions = array(
  '1a' => 'Tomar decisiones después de conocer qué piensan los demás',
  '1b' => 'Tomar decisiones sin consultar a otros',
  '2a' => 'Ser identificado como imaginativo o intuitivo',
  '2b' => 'Ser identificado como concreto y preciso',
  '3a' => 'Tomar decisiones sobre las personas basándome en datos disponibles y un análisis sistemático de las situaciones',
  '3b' => 'Tomar decisiones sobre las personas basándome en la empatía, emociones y entendimiento de sus necesidades y valores',
  '4a' => 'Permitir que los compromisos ocurran sólo si los otros quieren asumirlos',
  '4b' => 'Presionar para asegurarme de que los compromisos sean cumplidos',
  '5a' => 'Tener tiempo para reflexionar y estar tranquilo y en silencio solo',
  '5b' => 'Tener tiempo para estar activo y enérgico con otros',
  '6a' => 'Usar métodos que conozco bien y son efectivos para cumplir con mi trabajo',
  '6b' => 'Pensar en nuevos métodos para hacer las tareas',
  '7a' => 'Llegar a conclusiones basándome en un análisis lógico, racional y metódico',
  '7b' => 'Llegar a conclusiones basándome en lo que siento y creo desde la experiencia acerca de la vida y las personas',
  '8a' => 'Evitar comprometerme con fechas límite (deadlines)',
  '8b' => 'Armar un esquema de trabajo y seguirlo',
  '9a' => 'Los pensamientos y emociones que otros no pueden ver',
  '9b' => 'Actividades y ocurrencias en las cuales otros participan',
  '10a' => 'Lo abstracto y teórico',
  '10b' => 'Lo concreto y real',
  '11a' => 'Ayudar a otros a explorar sus emociones',
  '11b' => 'Ayudar a otros a tomar decisiones lógicas',
  '12a' => 'Comunicar muy poco de mis pensamientos y emociones',
  '12b' => 'Comunicar libremente mis pensamientos y emociones',
  '13a' => 'Planificar de antemano basándome en proyecciones',
  '13b' => 'Planificar a medida que aparecen las necesidades',
  '14a' => 'Conocer gente nueva',
  '14b' => 'Estar solo o con una persona a quien conozco bien',
  '15a' => 'El mundo de las ideas',
  '15b' => 'El mundo de las hechos comprobables',
  '16a' => 'Las convicciones',
  '16b' => 'Conclusiones verificables',
  '17a' => 'Llevar registro de mis compromisos y citas en agendas lo más que pueda',
  '17b' => 'Evitar registrar mis compromisos y citas en agendas lo más que pueda',
  '18a' => 'Llevar a la práctica planes cuidadosa y detalladamente precisos',
  '18b' => 'Diseñar planes y estructuras sin necesariamente llevarlos a la práctica',
  '19a' => 'Sentirme libre de hacer las cosas según se presenten',
  '19b' => 'Saber anticipadamente qué es lo que tengo que hacer',
  '20a' => 'Experimentar situaciones, discusiones o películas con alto contenido emocional',
  '20b' => 'Usar mi habilidad para analizar situaciones',
);

$data = json_decode(key($_POST), true);

if (isset($data['email'])){
  $answers = array();
  // echo var_dump($data['answers']);
  foreach ($questions as $key => $value) {
    $answers[] = $data['answers'][$key];
    $answers[$key] = $data['answers'][$key];
  }
  // echo var_dump($answers);
  // echo $answers[25];

  $name = $data['name'];
  $email = $data['email'];

  /* 
    Dots and spaces are being replaced by underscores probably due
    to the data being received as a key in the $_POST array.
  
    echo var_dump($email);
    echo $email;

    fix later, now hack the shit.
  */
  // $at = strpos($email, '@');
  // $part1=substr($email, 0, $at);
  // $part2=substr($email, $at, strlen($email));
  // $part2=str_replace('_', '.', $part2);
  // echo $part1 . $part2;
  // $email = $part1 . $part2;
  // ^^^ hack for mails with legit underscores before the @ 

  $name = str_replace('_', ' ', $name);
  $email = str_replace('_', '.', $email);
  
  // $email_patron = '/^[a-zA-Z0-9\._-]{3,}@[a-zA-Z0-9\.]{3,}\.{1,}[a-zA-Z]{2,4}$/';
  // $email_is_valid = preg_match($email_patron, $email);
  // echo var_dump($email_is_valid);

  /*
    @TODO: Guardar en la DB
      //Variables for connecting to the database.
    $hostname = "actusmbti.db.11260540.hostedresource.com";
    $username = "actusmbti";
    $password = "actusMBTI1!";
    $dbname = "actusmbti";

    if (@mysql_connect($hostname, $username, $password)) {
      if (@mysql_select_db($dbname)) {
        $query = "INSERT INTO tests VALUES(";
        $query .= "NULL, '{$_POST['name']}', '$email', NOW()";
        foreach ($questions as $key => $value) {
          $query .= ", '{$_POST[$key]}'";
        }
        $query .= ");";
        @mysql_query($query);
      }
    }
  */

  $origen = 'Actus <marubuteler@gmail.com>';
  // $origen = 'contacto@actus.com.ar;
  $actus_recipients = 'marubuteler@gmail.com, abuteler@enneagonstudios.com';
  $asunto = 'ACTUS :: Resultados Perfil estilo MBTI';

  ob_start();						// start capturing output
  include('mbti_email.php');		// execute the file
  $content = ob_get_contents();	// get the contents from the buffer
  ob_end_clean();					// stop buffering and discard contents

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers .= "From: $origen \r\n";

  // if ($email_is_valid) {
    $headers .= "To: $email \r\n";
    $headers .= "Bcc: $actus_recipients \r\n";
    mail($email, $asunto, $content, $headers);
  // } else {
    // $headers .= "To: $actus_recipients \r\n";
    // mail($actus_recipients, $asunto, $content, $headers);
  // }
  echo 'I dud itz!';
}
?>
