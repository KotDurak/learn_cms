<?php

function tableRows(array $columns, array $data): string {
        $html = '<table class="result-table">';
        $thead = '<thead> <tr>';

        foreach ($columns as $column) {
            $thead .= '<th>' . $column . '</th>';
        }

        $thead .= '</tr></thead>';
        $html .= $thead;

        $html .= '<tbody>';

        foreach ($data as $row) {

            $html .= '<tr>';

            foreach ($columns as $column) {
                $html .= '<td>' . $row[$column] . '</td>';
            }

            $html .= '</tr>';
        }

        $html .= '</tbody>';


        $html .= '</table>';

        return $html;
}