<?php
/**
 * Update data of a timeline
 *
 * @param array $filter
 * @param array $config
 * @param userForm $user
 * @return nothing just change data on repository
 */


function updateTimeline($filter, $config)

{
    switch ($config['repository'])
    {
        case 'txt':
            $filename = 'timeline.txt';
            // Recorrer el array de datos
            $timeline = file_get_contents($_SERVER['DOCUMENT_ROOT']."/".$filename);
            // Dividir por saltos de linea
            $timeline = explode("\n", $timeline);
            foreach($filter as $key => $value)
            {
                if(is_array($value))
                    $value=implode(',', $value);
                $data[$key]=$value;
            }
            $data = implode('|', $data);


            $timeline[$filter['id']] = $data;
            $timeline = implode("\n", $timeline);
            // Escribir todo el array al fichero
            return file_put_contents($_SERVER['DOCUMENT_ROOT']."/timeline.txt", $timeline);
            break;
        case 'db':

            // Conectarse al DBMS
            $link = mysqli_connect($config['database']['host'],
                $config['database']['user'],
                $config['database']['password']);
            // Seleccionar la DB
            mysqli_select_db($link, $config['database']['database']);
            // UPDATE user tabla a tabla...

            // Obtenemos el ID de tag
            $sql = "SELECT id_tag AS tag FROM tag
                    WHERE tag = '".$filter['tag']."'";

            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            $filter['tag'] = implode("|", $row);

            $sql = "UPDATE timeline SET
                   start_date = '".$filter['start_date']."',
                   end_date = '".$filter['end_date']."',
                   headline = '".$filter['headline']."',
                   text = '".$filter['text']."',
                   media = '".$filter['media']."',
                   media_credit = '".$filter['media_credit']."',
                   media_caption = '".$filter['media_caption']."',
                   media_thumbnail = '".$filter['media_thumbnail']."',
                   tag_id_tag = '".$filter['tag']."',
                   WHERE id_timeline = '".$filter['id']."';";

            mysqli_query($link, $sql);

            break;
        case 'gd':
            break;
    }
}

