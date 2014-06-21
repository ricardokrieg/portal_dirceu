<?php

function portaldirceu_planos_tablename() {
    global $wpdb;
    return($wpdb->prefix . 'portaldirceu_planos');
}


function portaldirceu_planos_install() {
    global $wpdb;
    $table_name = portaldirceu_planos_tablename();

    if(!defined('DB_CHARSET') || !($db_charset = DB_CHARSET))
        $db_charset = 'utf8';
    $db_charset = "CHARACTER SET ".$db_charset;
    if(defined('DB_COLLATE') && $db_collate = DB_COLLATE)
        $db_collate = "COLLATE ".$db_collate;

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
        $wpdb->query("ALTER TABLE `{$table_name}` {$db_charset} {$db_collate}");
        $wpdb->query("ALTER TABLE `{$table_name}` MODIFY name VARCHAR(255) {$db_charset} {$db_collate}");
        $wpdb->query("ALTER TABLE `{$table_name}` MODIFY price DECIMAL(10, 2) {$db_charset} {$db_collate}");
        $wpdb->query("ALTER TABLE `{$table_name}` MODIFY color INTEGER {$db_charset} {$db_collate}");
        $wpdb->query("ALTER TABLE `{$table_name}` MODIFY free_wifi BOOLEAN {$db_charset} {$db_collate}");
    }
    else {
        $sql = "CREATE TABLE " . $table_name . " (
            plan_id mediumint(9) NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            color INTEGER NOT NULL,
            free_wifi VARCHAR(255),
            created_at datetime NOT NULL,
            updated_at datetime,
            PRIMARY KEY (plan_id)
        ) {$db_charset} {$db_collate};";

        $results = $wpdb->query($sql);
    }
}
add_action('after_switch_theme', 'portaldirceu_planos_install');


function portaldirceu_planos_admin_menu() {
    add_object_page('Planos', 'Planos', 'edit_posts', 'planos', 'portaldirceu_planos_management');
}
add_action('admin_menu', 'portaldirceu_planos_admin_menu');


function portaldirceu_planos_add($plan) {
    if (!$plan) return "Nenhum plano para adicionar";

    global $wpdb;
    $table_name = portaldirceu_planos_tablename();

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
        return "Tabela não encontrada no Banco de Dados";
    else {
        global $allowedposttags;

        $name = wp_kses(stripslashes($name), $allowedposttags);
        $price = wp_kses(stripslashes($price), $allowedposttags);
        $color = wp_kses(stripslashes($color), $allowedposttags);
        $free_wifi = wp_kses(stripslashes($free_wifi), $allowedposttags);

        $name = "'".$wpdb->escape($name)."'";
        $price = $wpdb->escape($price);
        $color = $wpdb->escape($color);
        $free_wifi = $wpdb->escape($free_wifi);

        $insert = "INSERT INTO " . $table_name .
            "(name, price, color, free_wifi, created_at)" .
            "VALUES ({$name}, {$price}, {$color}, {$free_wifi}, NOW())";

        $results = $wpdb->query($insert);

        if ($results === FALSE)
            return "Aconteceu um erro no comando MySQL";
        else
            return "Plano adicionado";
   }
}


function portaldirceu_planos_edit($plan_id, $name, $price, $color, $free_wifi) {
    if (!$name || !$price) return "Plano não foi atualizado";

    if (!$plan_id) return portaldirceu_planos_add($name, $price, $color, $free_wifi);

    global $wpdb;
    $table_name = portaldirceu_planos_tablename();

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
        return "Tabela não encontrada no Banco de Dados";
    else {
        global $allowedposttags;

        $name = wp_kses(stripslashes($name), $allowedposttags);
        $price = wp_kses(stripslashes($price), $allowedposttags);
        $color = wp_kses(stripslashes($color), $allowedposttags);
        $free_wifi = wp_kses(stripslashes($free_wifi), $allowedposttags);

        $name = "'".$wpdb->escape($name)."'";
        $price = $wpdb->escape($price);
        $color = $wpdb->escape($color);
        $free_wifi = $wpdb->escape($free_wifi);

        $update = "UPDATE " . $table_name . "
            SET name = {$name},
                price = {$price},
                color = {$color},
                free_wifi = {$free_wifi},
                updated_at = NOW()
            WHERE plan_id = $plan_id";

        $results = $wpdb->query($update);

        if ($results === FALSE)
            return "Aconteceu um erro no comando MySQL";
        else
            return "Salvo";
   }
}


function portaldirceu_planos_delete($plan_id) {
    if ($plan_id) {
        global $wpdb;

        $sql = "DELETE from " . portaldirceu_planos_tablename() .
            " WHERE id = " . $plan_id;

        if ($wpdb->query($sql) === FALSE)
            return "Aconteceu um erro no comando MySQL";
        else
            return "Plano excluído";
    } else return "O Plano não foi excluído"
}


function quotescollection_bulkdelete($plan_ids) {
    if (!$plan_ids) return "Nada feito!";

    global $wpdb;

    $sql = "DELETE FROM ". portaldirceu_planos_tablename() ."WHERE plan_id IN (".implode(', ', $plan_ids).")";

    $wpdb->query($sql);

    return "Plano(s) excluído(s)";
}


function portaldirceu_planos_management() {
    $display = $msg = $plans_list = $alternate = "";

    if (isset($_REQUEST['submit'])) {
        if($_REQUEST['submit'] == "Adicionar Plano") {
            extract($_REQUEST);
            $msg = portaldirceu_planos_add($name, $price, $color, $free_wifi);
        }
        else if($_REQUEST['submit'] == "Salvar") {
            extract($_REQUEST);
            $msg = portaldirceu_planos_edit($plan_id, $name, $price, $color, $free_wifi);
        }
    } else if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'edit') {
            $display .= "<div class=\"wrap\">\n<h2>Quotes Collection &raquo; ".__('Edit quote', 'quotes-collection')."</h2>";
            $display .=  portaldirceu_planos_editform($_REQUEST['id']);
            $display .= "</div>";

            echo $display;
            return;
        } else if ($_REQUEST['action'] == 'delplan') {
            $msg = portaldirceu_planos_delete($_REQUEST['id']);
        }
    } else if (isset($_REQUEST['bulkactionsubmit']))  {
        if ($_REQUEST['bulkaction'] == 'delete')
            $msg = portaldirceu_planos_bulkdelete($_REQUEST['bulkcheck']);
    }

    $display .= "<div class=\"wrap\">";

    if ($msg)
        $display .= "<div id=\"message\" class=\"updated fade\"><p>{$msg}</p></div>";

    $display .= "<h2>Quotes Collection <a href=\"#addnew\" class=\"add-new-h2\">Adicionar novo Plano</a></h2>";

    $num_plans = portaldirceu_planos_count();

    if (!$num_plans) {
        $display .= "<p>Nenhum Plano encontrado</p>";

        $display .= "</div>";

        $display .= "<div id=\"addnew\" class=\"wrap\">\n<h2>Adicionar novo Plano</h2>";
        $display .= portaldirceu_planos_editform();
        $display .= "</div>";

        echo $display;
        return;
    }

    global $wpdb;

    $sql = "SELECT plan_id, name, price, color, free_wifi FROM " . portaldirceu_planos_tablename();

    $option_selected = array (
        'plan_id' => '',
        'name' => '',
        'price' => '',
        'color' => '',
        'free_wifi' => '',
        'created_at' => '',
        'updated_at' => '',
        'ASC' => '',
        'DESC' => '',
    );

    $admin_url = get_bloginfo('wpurl'). "/wp-admin/admin.php?page=planos";

    $plans = $wpdb->get_results($sql);

    foreach ($plans as $plan_data) {
        if ($alternate) $alternate = "";
        else $alternate = " class=\"alternate\"";

        $plans_list .= "<tr{$alternate}>";
        $plans_list .= "<th scope=\"row\" class=\"check-column\"><input type=\"checkbox\" name=\"bulkcheck[]\" value=\"".$plan_data->plan_id."\" /></th>";
        $plans_list .= "<td>" . $plan_data->plan_id . "</td>";
        $plans_list .= "<td>";
        $plans_list .= wptexturize(nl2br(make_clickable($plan_data->name)));
        $plans_list .= "<div class=\"row-actions\"><span class=\"edit\"><a href=\"{$admin_url}&action=editquote&amp;id=".$plan_data->plan_id."\" class=\"edit\">Editar</a></span> | <span class=\"trash\"><a href=\"{$admin_url}&action=delplan&amp;id=".$plan_data->plan_id."\" onclick=\"return confirm( 'Você tem certeza de que quer excluir este Plano?');\" class=\"delete\">Excluir</a></span></div>";
        $plans_list .= "</td>";
        $plans_list .= "<td>". make_clickable($plan_data->price) ."</td>";
        $plans_list .= "</tr>";
    }

    if ($plans_list) {
        $plans_count = portaldirceu_planos_count();

        $display .= "<form id=\"portaldirceu_planos\" method=\"post\" action=\"".get_bloginfo('wpurl')."/wp-admin/admin.php?page=planos\">";
        $display .= "<div class=\"tablenav\">";
        $display .= "<div class=\"alignleft actions\">";
        $display .= "<select name=\"bulkaction\">";
        $display .=     "<option value=\"0\">".__('Bulk Actions')."</option>";
        $display .=     "<option value=\"delete\">Excluir</option>";
        $display .= "</select>";
        $display .= "<input type=\"submit\" name=\"bulkactionsubmit\" value=\"Aplicar\" class=\"button-secondary\" />";
        $display .= "&nbsp;&nbsp;&nbsp;";
        $display .= "</div>";
        $display .= "<div class=\"clear\"></div>";
        $display .= "</div>";


        $display .= "<table class=\"widefat\">";
        $display .= "<thead><tr>
            <th class=\"check-column\"><input type=\"checkbox\" onclick=\"quotescollection_checkAll(document.getElementById('quotescollection'));\" /></th>
            <th>ID</th><th>".__('The quote', 'quotes-collection')."</th>
            <th>
                ".__('Author', 'quotes-collection')." / ".__('Source', 'quotes-collection')."
            </th>
            <th>".__('Tags', 'quotes-collection')."</th>
            <th>".__('Public?', 'quotes-collection')."</th>
        </tr></thead>";
        $display .= "<tbody id=\"the-list\">{$plans_list}</tbody>";
        $display .= "</table>";

        $display .= "<div class=\"tablenav\">";
        $display .= '<div class="tablenav-pages"><span class="displaying-num">'.sprintf(_n('%d quote', '%d quotes', $plans_count, 'quotes-collection'), $plans_count).'</span><span class="pagination-links">'. $page_nav. "</span></div>";
        $display .= "<div class=\"clear\"></div>";
        $display .= "</div>";

        $display .= "</form>";
        $display .= "<br style=\"clear:both;\" />";

    } else
        $display .= "<p>Nenhum Plano encontrado</p>";

    $display .= "</div>";

    $display .= "<div id=\"addnew\" class=\"wrap\">\n<h2>".__('Add new quote', 'quotes-collection')."</h2>";
    $display .= quotescollection_editform();
    $display .= "</div>";

    echo $display;
}
