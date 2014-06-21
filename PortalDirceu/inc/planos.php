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


function portaldirceu_planos_management() {
    $display = $msg = $quotes_list = $alternate = "";

    if (isset($_REQUEST['submit'])) {
        if($_REQUEST['submit'] == "Adicionar Plano") {
            extract($_REQUEST);
            $msg = portaldirceu_planos_add($quote, $author, $source);
        }
        else if($_REQUEST['submit'] == "Salvar") {
            extract($_REQUEST);
            $msg = portaldirceu_planos_edit($quote_id, $quote, $author, $source);
        }
    } else if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'edit') {
            $display .= "<div class=\"wrap\">\n<h2>Quotes Collection &raquo; ".__('Edit quote', 'quotes-collection')."</h2>";
            $display .=  quotescollection_editform($_REQUEST['id']);
            $display .= "</div>";
            echo $display;
            return;
        } else if ($_REQUEST['action'] == 'del') {
            $msg = quotescollection_deletequote($_REQUEST['id']);
        }
    } else if (isset($_REQUEST['bulkactionsubmit']))  {
        if ($_REQUEST['bulkaction'] == 'delete')
            $msg = quotescollection_bulkdelete($_REQUEST['bulkcheck']);
        if ($_REQUEST['bulkaction'] == 'make_public') {
            $msg = quotescollection_changevisibility($_REQUEST['bulkcheck'], 'yes');
        }
        if ($_REQUEST['bulkaction'] == 'keep_private') {
            $msg = quotescollection_changevisibility($_REQUEST['bulkcheck'], 'no');
        }
    }

    $display .= "<div class=\"wrap\">";

    if ($msg)
        $display .= "<div id=\"message\" class=\"updated fade\"><p>{$msg}</p></div>";

    $display .= "<h2>Quotes Collection <a href=\"#addnew\" class=\"add-new-h2\">".__('Add new quote', 'quotes-collection')."</a></h2>";

    $num_quotes = quotescollection_count();

    if (!$num_quotes) {
        $display .= "<p>".__('No quotes in the database', 'quotes-collection')."</p>";

        $display .= "</div>";

        $display .= "<div id=\"addnew\" class=\"wrap\">\n<h2>".__('Add new quote', 'quotes-collection')."</h2>";
        $display .= quotescollection_editform();
        $display .= "</div>";

        echo $display;
        return;
    }

    global $wpdb;

    $sql = "SELECT quote_id, quote, author, source, tags, public
        FROM " . $wpdb->prefix . "quotescollection";

    $option_selected = array (
        'quote_id' => '',
        'quote' => '',
        'author' => '',
        'source' => '',
        'time_added' => '',
        'time_updated' => '',
        'public' => '',
        'ASC' => '',
        'DESC' => '',
    );
    if(isset($_REQUEST['orderby'])) {
        $sql .= " ORDER BY " . $_REQUEST['orderby'] . " " . $_REQUEST['order'];
        $option_selected[$_REQUEST['orderby']] = " selected=\"selected\"";
        $option_selected[$_REQUEST['order']] = " selected=\"selected\"";
    }
    else {
        $sql .= " ORDER BY quote_id ASC";
        $option_selected['quote_id'] = " selected=\"selected\"";
        $option_selected['ASC'] = " selected=\"selected\"";
    }

    if(isset($_REQUEST['paged']) && $_REQUEST['paged'] && is_numeric($_REQUEST['paged']))
        $paged = $_REQUEST['paged'];
    else
        $paged = 1;

    $limit_per_page = 20;



    $total_pages = ceil($num_quotes / $limit_per_page);


    if($paged > $total_pages) $paged = $total_pages;

    $admin_url = get_bloginfo('wpurl'). "/wp-admin/admin.php?page=quotes-collection";
    if(isset($_REQUEST['orderby']))
        $admin_url .= "&orderby=".$_REQUEST['orderby']."&order=".$_REQUEST['order'];

    $page_nav = quotescollection_pagenav($total_pages, $paged, 2, 'paged', $admin_url);

    $start = ($paged - 1) * $limit_per_page;

    $sql .= " LIMIT {$start}, {$limit_per_page}";

    // Get all the quotes from the database
    $quotes = $wpdb->get_results($sql);

    foreach($quotes as $quote_data) {
        if($alternate) $alternate = "";
        else $alternate = " class=\"alternate\"";
        $quotes_list .= "<tr{$alternate}>";
        $quotes_list .= "<th scope=\"row\" class=\"check-column\"><input type=\"checkbox\" name=\"bulkcheck[]\" value=\"".$quote_data->quote_id."\" /></th>";
        $quotes_list .= "<td>" . $quote_data->quote_id . "</td>";
        $quotes_list .= "<td>";
        $quotes_list .= wptexturize(nl2br(make_clickable($quote_data->quote)));
        $quotes_list .= "<div class=\"row-actions\"><span class=\"edit\"><a href=\"{$admin_url}&action=editquote&amp;id=".$quote_data->quote_id."\" class=\"edit\">".__('Edit', 'quotes-collection')."</a></span> | <span class=\"trash\"><a href=\"{$admin_url}&action=delquote&amp;id=".$quote_data->quote_id."\" onclick=\"return confirm( '".__('Are you sure you want to delete this quote?', 'quotes-collection')."');\" class=\"delete\">".__('Delete', 'quotes-collection')."</a></span></div>";
        $quotes_list .= "</td>";
        $quotes_list .= "<td>" . make_clickable($quote_data->author);
        if($quote_data->author && $quote_data->source)
            $quotes_list .= " / ";
        $quotes_list .= make_clickable($quote_data->source) ."</td>";
        $quotes_list .= "<td>" . implode(', ', explode(',', $quote_data->tags)) . "</td>";
        if($quote_data->public == 'no') $public = __('No', 'quotes-collection');
        else $public = __('Yes', 'quotes-collection');
        $quotes_list .= "<td>" . $public  ."</td>";
        $quotes_list .= "</tr>";
    }

    if($quotes_list) {
        $quotes_count = quotescollection_count();

        $display .= "<form id=\"quotescollection\" method=\"post\" action=\"".get_bloginfo('wpurl')."/wp-admin/admin.php?page=quotes-collection\">";
        $display .= "<div class=\"tablenav\">";
        $display .= "<div class=\"alignleft actions\">";
        $display .= "<select name=\"bulkaction\">";
        $display .=     "<option value=\"0\">".__('Bulk Actions')."</option>";
        $display .=     "<option value=\"delete\">".__('Delete', 'quotes-collection')."</option>";
        $display .=     "<option value=\"make_public\">".__('Make public', 'quotes-collection')."</option>";
        $display .=     "<option value=\"keep_private\">".__('Keep private', 'quotes-collection')."</option>";
        $display .= "</select>";
        $display .= "<input type=\"submit\" name=\"bulkactionsubmit\" value=\"".__('Apply', 'quotes-collection')."\" class=\"button-secondary\" />";
        $display .= "&nbsp;&nbsp;&nbsp;";
        $display .= __('Sort by: ', 'quotes-collection');
        $display .= "<select name=\"orderby\">";
        $display .= "<option value=\"quote_id\"{$option_selected['quote_id']}>".__('Quote', 'quotes-collection')." ID</option>";
        $display .= "<option value=\"quote\"{$option_selected['quote']}>".__('Quote', 'quotes-collection')."</option>";
        $display .= "<option value=\"author\"{$option_selected['author']}>".__('Author', 'quotes-collection')."</option>";
        $display .= "<option value=\"source\"{$option_selected['source']}>".__('Source', 'quotes-collection')."</option>";
        $display .= "<option value=\"time_added\"{$option_selected['time_added']}>".__('Date added', 'quotes-collection')."</option>";
        $display .= "<option value=\"time_updated\"{$option_selected['time_updated']}>".__('Date updated', 'quotes-collection')."</option>";
        $display .= "<option value=\"public\"{$option_selected['public']}>".__('Visibility', 'quotes-collection')."</option>";
        $display .= "</select>";
        $display .= "<select name=\"order\"><option{$option_selected['ASC']}>ASC</option><option{$option_selected['DESC']}>DESC</option></select>";
        $display .= "<input type=\"submit\" name=\"orderbysubmit\" value=\"".__('Go', 'quotes-collection')."\" class=\"button-secondary\" />";
        $display .= "</div>";
        $display .= '<div class="tablenav-pages"><span class="displaying-num">'.sprintf(_n('%d quote', '%d quotes', $quotes_count, 'quotes-collection'), $quotes_count).'</span><span class="pagination-links">'. $page_nav. "</span></div>";
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
        $display .= "<tbody id=\"the-list\">{$quotes_list}</tbody>";
        $display .= "</table>";

        $display .= "<div class=\"tablenav\">";
        $display .= '<div class="tablenav-pages"><span class="displaying-num">'.sprintf(_n('%d quote', '%d quotes', $quotes_count, 'quotes-collection'), $quotes_count).'</span><span class="pagination-links">'. $page_nav. "</span></div>";
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
