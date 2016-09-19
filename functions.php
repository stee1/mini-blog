<?php
require_once 'db_connection.php';


function getAllRecords($mysqli) {

    $select_query = "SELECT * FROM record";

    $result = $mysqli->query($select_query);
    if ($result) {

        $all_data = array();

        $i = 0;

        while ($record = $result->fetch_array(MYSQLI_ASSOC)) {

            $select_query_comments = "SELECT id_comment FROM comments WHERE id_record=" . $record['id_record'];

            $result_comments = $mysqli->query($select_query_comments);

            if (!$result_comments) {
                echo "error";
            }

            $all_data[$i] = [
                'id_record' => $record['id_record'],
                'author' => $record['author'],
                'date' => $record['date'],
                'text' => $record['text'],
                'num_comments' => $result_comments->num_rows,
            ];
            $i++;
        }

    } else {
        echo "error";
        $all_data = null;
    }

    return $all_data;
}

function sortRecordsBy($records, $field_name_to_sort)
{
    $result = $records;

    for ($i = 0; $i < count($result); $i++) {
        for ($j = 0; $j < count($result); $j++) {
            if ($result[$i][$field_name_to_sort] > $result[$j][$field_name_to_sort]) {
                $tmp = $result[$j];
                $result[$j] = $result[$i];
                $result[$i] = $tmp;
            }
        }
    }

    return $result;
}

//Обрезает строку до 100 символов, учитывая добавляемое "...", с учетом слов
function trimTo100Char($string)
{
    if ( strlen ($string) > 97) {
        $tmp_str = mb_substr($string, 0, 97);
        if ($tmp_str[96] != " ") {
            $tmp_str = mb_substr($tmp_str, 0, strripos($tmp_str, " "));
        } else {
            $tmp_str = rtrim($tmp_str);
        }
        return $tmp_str . '...';
    }
    else {
        return $string;
    }
}

function echoRecord($record)
{
    return "<strong><p>" . $record['author'] . " (<span>" . $record['date'] . "</span>)</p></strong>
                    <p class='record-text'>" . trimTo100Char($record['text']) . "</p>
                    <a href='record-" . $record['id_record'] . "' class='comments-link'>
                        <p class='comments'>Коментариев <span
                                class='badge'>" . $record['num_comments'] . "</span></p>
                    </a>
                    <a href='record-" . $record['id_record'] . "' class='pull-right'>Читать
                        полностью</a>";
}