<br>
<div id="admin_form2">
    <div class="row">
        <form id="form_listar_criar" name="form_listar_criar">
            <div class="col-xs-1"></div>
            <div class="col-xs-4">
                <div class="left">
                    <div class="row">
                        <input type="radio" id="pendence_option_listar" name="pendence_option" value="1" checked="checked" 
                               onchange="document.form_listar_criar.pendences_date.disabled=false;
                                         document.form_listar_criar.client_id_listar.disabled=false;
                                         document.form_listar_criar.creation_date_from.disabled=false;
                                         document.form_listar_criar.creation_date_to.disabled=false;
                                         document.form_listar_criar.type_option1.disabled=false;
                                         document.form_listar_criar.type_option2.disabled=false;
                                         document.form_listar_criar.type_option3.disabled=false;
                                         document.form_listar_criar.execute_query2.disabled=false;
                                         document.form_listar_criar.client_id.disabled=true;
                                        // document.form_listar_criar.day.disabled=true;
                                        // document.form_listar_criar.month.disabled=true;
                                        // document.form_listar_criar.year.disabled=true;
                                         document.form_listar_criar.event_date.disabled=true;
                                         document.form_listar_criar.pendence_text.disabled=true;
                                         document.form_listar_criar.frequency_option1.disabled=true;
                                         document.form_listar_criar.frequency_option2.disabled=true;
                                         document.form_listar_criar.frequency_option3.disabled=true;
                                         document.form_listar_criar.execute_query3.disabled=true;"/>
                        <label for="pendence_option_listar">LISTAR PENDÊNCIAS</label>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="center filters">
                                <b>Data da execução</b>
                                <select id="pendences_date" name="pendences_date" class="form-control">
                                    <option value="all" <?php if (isset($form_filter) && $form_filter[pendences_date] == "all") { echo ' selected'; } ?> >Todas</option>
                                    <option value="before" <?php if (isset($form_filter) && $form_filter[pendences_date] == "before") { echo ' selected'; } ?> >Anteriores</option>
                                    <option value="-30" <?php if (isset($form_filter) && $form_filter[pendences_date] == "-30") { echo ' selected'; } ?> >-30 dias</option>
                                    <option value="-7" <?php if (isset($form_filter) && $form_filter[pendences_date] == "-7") { echo ' selected'; } ?> >-7 dias</option>
                                    <option value="-1" <?php if (isset($form_filter) && $form_filter[pendences_date] == "-1") { echo ' selected'; } ?> >Ontem</option>
                                    <option value="0" <?php if (isset($form_filter)) { if ($form_filter[pendences_date] == "0") { echo ' selected'; } } else { echo ' selected'; } ?> >Hoje</option>
                                    <option value="1" <?php if (isset($form_filter) && $form_filter[pendences_date] == "1") { echo ' selected'; } ?> >Amanhã</option>
                                    <option value="7" <?php if (isset($form_filter) && $form_filter[pendences_date] == "7") { echo ' selected'; } ?> >+7 dias</option>
                                    <option value="30" <?php if (isset($form_filter) && $form_filter[pendences_date] == "30") { echo ' selected'; } ?> >+30 dias</option>
                                    <option value="after" <?php if (isset($form_filter) && $form_filter[pendences_date] == "after") { echo ' selected'; } ?> >Posteriores</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="center filters">
                                <b>ID do cliente</b>
                                <input id="client_id_listar" name="client_id_listar" class="form-control" placeholder="ID do cliente">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="center filters">
                            <b>Data da criação</b>
                        </div>
                        <div class="col-xs-1">
                            <b>do</b>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" id="creation_date_from" name="creation_date_from" placeholder="mm/dd/yyyy" class="form-control">
                        </div>
                        <div class="col-xs-1">
                            <b>até</b>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" id="creation_date_to" name="creation_date_to" placeholder="mm/dd/yyyy" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label><input type="radio" id="type_option1" name="type_option" value="1" checked="checked" /> Abertas</label>
                        <label><input type="radio" id="type_option2" name="type_option" value="2" <?php if (isset($form_filter) && $form_filter[type_option2] == "true") { echo 'checked'; } ?> /> Resolvidas</label>
                        <label><input type="radio" id="type_option3" name="type_option" value="3" <?php if (isset($form_filter) && $form_filter[type_option3] == "true") { echo 'checked'; } ?> /> Ambas</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button  style="min-width:100px" id="execute_query2" name="execute_query2" type="button" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff">
                            <span class="ladda-label">Listar</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="row">
                    <input type="radio" id="pendence_option_criar" name="pendence_option" value="2"
                           onchange="document.form_listar_criar.pendences_date.disabled=true;
                                     document.form_listar_criar.client_id_listar.disabled=true;
                                     document.form_listar_criar.creation_date_from.disabled=true;
                                         document.form_listar_criar.creation_date_to.disabled=true;
                                     document.form_listar_criar.type_option1.disabled=true;
                                     document.form_listar_criar.type_option2.disabled=true;
                                     document.form_listar_criar.type_option3.disabled=true;
                                     document.form_listar_criar.execute_query2.disabled=true;
                                     document.form_listar_criar.client_id.disabled=false;
                                    // document.form_listar_criar.day.disabled=false;
                                    // document.form_listar_criar.month.disabled=false;
                                    // document.form_listar_criar.year.disabled=false;
                                     document.form_listar_criar.event_date.disabled=false;
                                     document.form_listar_criar.pendence_text.disabled=false;
                                     document.form_listar_criar.frequency_option1.disabled=false;
                                     document.form_listar_criar.frequency_option2.disabled=false;
                                     document.form_listar_criar.frequency_option3.disabled=false;
                                     document.form_listar_criar.execute_query3.disabled=false;"/>
                    <label for="pendence_option_criar">CRIAR PENDÊNCIAS</label>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="center filters">
                       <!-- <table>
                                <tr>
                                    <th class="center filters">ID do cliente</th>
                                    <th>&nbsp;&nbsp;&nbsp;</th>
                                    <th class="center filters" colspan="5">Data da execução</th>
                                </tr>
                                <tr>
                                    <td><input id="client_id" name="client_id" class="form-control" placeholder="ID do cliente" style="width: 140px" disabled></td>
                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                     <td><input id="event_date" name="event_date" type="text" class="form-control"  placeholder="MM/DD/YYYY" disabled></td> 
                                    <td><select id="day" name="day" class="form-control" style="min-width: 60px" disabled>
                                        <option value="<?php //echo date('d'); ?>">Dia</option>
                                        <?php //for ($day = 1; $day <= 31; $day++) { ?>
                                        <option value="<?php //echo strlen($day)==1 ? '0'.$day : $day; ?>"><?php //echo strlen($day)==1 ? '0'.$day : $day; ?></option>
                                        <?php //} ?>
                                        </select></td>
                                        <td>&nbsp;<b>/</b>&nbsp;</td>
                                    <td><select id="month" name="month" class="form-control" style="min-width: 70px" disabled>
                                        <option value="<?php //echo date('m'); ?>">Mês</option>
                                        <?php //for ($month = 1; $month <= 12; $month++) { ?>
                                        <option value="<?php //echo strlen($month)==1 ? '0'.$month : $month; ?>"><?php //echo strlen($month)==1 ? '0'.$month : $month; ?></option>
                                        <?php //} ?>
                                        </select></td>
                                    <td>&nbsp;<b>/</b>&nbsp;</td>
                                    <td><select id="year" name="year" class="form-control" style="min-width: 75px" disabled>
                                        <option value="<?php //echo date('Y'); ?>">Ano</option>
                                        <?php //for ($year = date('Y'); $year <= date('Y')+1; $year++) { ?>
                                        <option value="<?php //echo $year; ?>"><?php //echo $year; ?></option>
                                        <?php //} ?>
                                        </select></td>
                                </tr>
                            </table> -->
                            <b>ID do cliente</b>
                            <input id="client_id" name="client_id" class="form-control" placeholder="ID do cliente" disabled value="<?php if (isset($form_filter) && $form_filter[client_id_listar] != "") { echo $form_filter[client_id_listar]; } ?>">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="center filters">
                            <b>Data da execução</b>
                            <input type="text" id="event_date" name="event_date" placeholder="mm/dd/yyyy" class="form-control" disabled>
                        </div>    
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="center filters">
                            <b>Texto da pendência</b>
                            <textarea id="pendence_text" name="pendence_text" class="form-control" placeholder="Texto da pendência" style="min-width: 380px; max-width: 380px; min-height: 75px" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-2">
                <br><br>
                <div class="row">
                    <label>Frequencia:</label>
                </div>
                <div class="row">
                    <label style="font-weight:normal"><input type="radio" id="frequency_option1" name="frequency_option" value="1" checked="checked" onchange="document.form_listar_criar.number_times.disabled=true;" disabled/> Única</label>
                </div>
                <div class="row">
                    <label style="font-weight:normal"><input type="radio" id="frequency_option2" name="frequency_option" value="2" onchange="document.form_listar_criar.number_times.disabled=false;" disabled/>
                    <input type="text" id="number_times" name="number_times" placeholder="12" size="2" maxlength="2" disabled> vezes</label>
                </div>
                <div class="row">
                    <label style="font-weight:normal"><input type="radio" id="frequency_option3" name="frequency_option" value="3" onchange="document.form_listar_criar.number_times.disabled=true;" disabled/> Infinita</label>
                </div> 
                <br>
                <div class="row">
                    <div class="left">
                        <button  style="min-width:100px" id="execute_query3" name="execute_query3" type="button" class="btn btn-success ladda-button"  data-style="expand-left" data-spinner-color="#ffffff" disabled>
                            <span class="ladda-label">Criar</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-1"></div>   
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <?php
            if (isset($result)) {
                $num_rows = count($result);
                echo '<br><p><b style="color:red">Total de registros: </b><b>'.$num_rows.'</b></p><br>';
            }
        ?>
    </div>
    <div class="col-xs-1"></div>
</div>

<?php if (isset($form_filter)) {
echo '<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <table>
            <tr class="list-group-item-success">
                <th style="min-width:50px; max-width:50px; padding:5px; text-align: center"><b>No.</b></th>
                <th style="min-width:100px; max-width:100px; padding:5px; text-align: center"><b>Dumbu ID</b></th>
                <th style="min-width:200px; max-width:200px; padding:5px; text-align: center"><b>Text</b></th>
                <th style="min-width:100px; max-width:100px; padding:5px; text-align: center"><b>Initial date</b></th>
                <th style="min-width:100px; max-width:100px; padding:5px; text-align: center"><b>Event date</b></th>
                <th style="min-width:125px; max-width:125px; padding:5px; text-align: center"><b>Resolved date</b></th>
                <th style="min-width:50px; max-width:50px; padding:5px; text-align: center"><b>#</b></th>
                <th style="min-width:60px; max-width:60px; padding:5px; text-align: center"><b>Freq</b></th>
                <th style="min-width:200px; max-width:200px; padding:5px; text-align: center"><b>Closed message</b></th>
                <th style="min-width:100px; max-width:100px; padding:5px; text-align: center"><b>Operation</b></th>
            </tr>
        </table>
    </div>
    <div class="col-xs-1"></div>
</div>';
} ?>

<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10">
        <table>
            <?php                    
                if (isset($result)) {                        
                    for ($i = 0; $i < $num_rows; $i++) {
                        echo '<tr id="row-client-'.$result[$i]['id'].'" style="border-top: gray 1px solid'; 
                        if ($i % 2) {echo '; background-color: #dff0d8';}
                        echo '">';
                            echo '<td style="min-width:50px; max-width:50px; padding:5px; text-align: center"><b>'.($i + 1).'</b></td>';
                            echo '<td style="min-width:100px; max-width:100px; padding:5px; text-align: center">'
                                    .'<label id="client_id_'.$result[$i]['id'].'" style="font-weight:normal">'.$result[$i]['client_id'].'</label>'
                                    .'<input id="new_client_id_'.$result[$i]['id'].'" name="new_client_id_'.$result[$i]['id'].'" type="text" class="form-control"  value="'.$result[$i]['client_id'].'" style="display:none"></td>';
                            echo '<td style="min-width:200px; max-width:200px; padding:5px; text-align: left">'
                                    .'<label id="text_'.$result[$i]['id'].'" style="font-weight:normal">'.$result[$i]['text'].'</label>'
                                    .'<textarea id="new_text_'.$result[$i]['id'].'" class="form-control" placeholder="Texto da pendência" style="min-width:190px; max-width:190px; min-height: 75px; display:none">'.$result[$i]['text'].'</textarea></td>';
                            echo '<td style="min-width:100px; max-width:100px; padding:5px; text-align: center">'.date('d-m-Y h:i:sa',$result[$i]['init_date']).'</td>';
                            echo '<td style="min-width:100px; max-width:100px; padding:5px; text-align: center">'
                                    .'<select id="new_day_'.$result[$i]['id'].'" class="form-control" style="width:60px; display:none" title="Dia">';
                                        for ($day = 1; $day <= 31; $day++) {
                                            echo '<option value="'.(strlen($day)==1 ? '0'.$day : $day).'"';
                                            if ($day == date('d',$result[$i]['event_date'])) {
                                                echo ' selected';
                                            }
                                            echo '>'.(strlen($day)==1 ? '0'.$day : $day).'</option>';
                                        }
                                echo '</select>'
                                    .'<select id="new_month_'.$result[$i]['id'].'" class="form-control" style="width:60px; display:none" title="Mês">';
                                        for ($month = 1; $month <= 12; $month++) {
                                            echo '<option value="'.(strlen($month)==1 ? '0'.$month : $month).'"';
                                            if ($month == date('m',$result[$i]['event_date'])) {
                                                echo ' selected';
                                            }
                                            echo '>'.(strlen($month)==1 ? '0'.$month : $month).'</option>';
                                        }
                                echo '</select>'
                                    .'<select id="new_year_'.$result[$i]['id'].'" class="form-control" style="width:75px; display:none" title="Ano">';
                                        for ($year = date('Y'); $year <= date('Y')+1; $year++) {
                                            echo '<option value="'.$year.'"';
                                            if ($year == date('Y',$result[$i]['event_date'])) {
                                                echo ' selected';
                                            }
                                            echo '>'.$year.'</option>';
                                        }
                                echo '</select>'
                                    .'<label id="event_date_'.$result[$i]['id'].'" style="font-weight:normal">'.date('d-m-Y h:i:sa',$result[$i]['event_date']).'</label></td>';
                            echo '<td style="min-width:125px; max-width:125px; padding:5px; text-align: center">'
                                    .'<label id="resolved_date_'.$result[$i]['id'].'" style="font-weight:normal">';
                                if ($result[$i]['resolved_date']) {echo date('d-m-Y h:i:sa',$result[$i]['resolved_date']);}
                                else {echo '---';}
                            echo '</label></td>';
                            echo '<td style="min-width:50px; max-width:50px; padding:5px; text-align: center">'.$result[$i]['number'].'</td>';
                            echo '<td style="min-width:60px; max-width:60px; padding:5px; text-align: center">';
                                if ($result[$i]['frequency'] == 1) {echo 'Única';}
                                else if ($result[$i]['frequency'] == 0) {echo 'Infinita';}
                                else { echo $result[$i]['frequency'];}
                            echo '</td>';
                            echo '<td style="min-width:200px; max-width:200px; padding:5px; text-align:left">'
                                    .'<textarea id="new_pendence_closed_message_'.$result[$i]['id'].'" name="new_pendence_closed_message_'.$result[$i]['id'].'" class="form-control" placeholder="Texto final da pendência" style="min-width:190px; max-width:190px; min-height: 75px; display:none">'.$result[$i]['closed_message'].'</textarea>'
                                    .'<label id="pendence_closed_message_'.$result[$i]['id'].'" style="font-weight:normal">';
                                if ($result[$i]['closed_message']) {echo $result[$i]['closed_message'];}
                                else {echo '---';}
                            echo '</label></td>';
                            if (!$result[$i]['resolved_date']) {
                                echo '<td style="min-width:100px; max-width:100px; padding:5px; text-align: center">
                                        <button  style="min-width:80px" id="'.$result[$i]['id'].'" name="execute_query4" type="button" class="btn btn-success ladda-button editar-pendencia"  data-style="expand-left" data-spinner-color="#ffffff">
                                            <span class="ladda-label">Editar</span>
                                        </button>
                                        <br>
                                        <button  style="min-width:80px; display:none" id="atualizar_'.$result[$i]['id'].'" name="execute_query5" type="button" class="btn btn-success ladda-button atualizar-pendencia"  data-style="expand-left" data-spinner-color="#ffffff">
                                            <span class="ladda-label">Atualizar</span>
                                        </button>
                                        <br>
                                        <button  style="min-width:80px" id="resolver_'.$result[$i]['id'].'" name="execute_query6" type="button" class="btn btn-success ladda-button resolver-pendencia"  data-style="expand-left" data-spinner-color="#ffffff">
                                            <span class="ladda-label">Resolver</span>
                                        </button>
                                      </td>';  
                            } else { echo '<td></td>'; }
                        echo '</tr>';
                    }
                }               
            ?>
        </table>
    </div>
    <div class="col-xs-1"></div>            
</div>