    <br><br>
    
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">
            <div class="center">
                <h3>Tabela de trabalho hoje</h3>
                <br>
                <table class="table">
                    <?php
                        echo '<tr class="alert alert-success" style="color:blue">';
                            echo '<td>Total por plano: </td>';
                            echo '<td>Seguidos hoje: </td>';
                            echo '<td>Ainda faltam: </td>';
                        echo '</tr>';  
                        $n=count($my_daily_work);
                        $ainda_faltam_por_seguir=0;
                        for($i=0;$i<$n;$i++){                                
                            $ainda_faltam_por_seguir=$ainda_faltam_por_seguir+$my_daily_work[$i]['to_follow'];
                        }
                        echo '<tr>';
                            echo '<td>'. $plane_datas.'</td>';
                            echo '<td>';
                                //if ($ainda_faltam_por_seguir != 0) echo ($plane_datas - $ainda_faltam_por_seguir);
                                //else echo '???';
                                echo $followed_today;
                            echo '</td>';
                            echo '<td>'.$ainda_faltam_por_seguir.'</td>';                                    
                        echo '</tr>';
                    ?>
                </table> 
            </div>
        </div>
        <div class="col-xs-3"></div>            
    </div>
    
    
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">
            <div class="center">                   
                <h3>Tabela de trabalho por perfil hoje</h3>
                <br>
                <div style="text-align:left">
                    <table class="table">
                        <?php 
                            echo '<tr class="alert alert-success" style="color:blue">';
                                echo '<td>No.</td>';
                                echo '<td>Dumbu ID</td>';
                                echo '<td>Profile</td>';
                                echo '<td>A seguir</td>';
                                echo '<td>A deseguer</td>';
                                echo '<td>Finalizado</td>';                                    
                            echo '</tr>';
                                
                            $n=count($my_daily_work);
                            for($i=0;$i<$n;$i++){
                                echo '<tr>';
                                    echo '<td>'.($i+1).'</td>';
                                    echo '<td>'.$my_daily_work[$i]['id'].'</td>';
                                    echo '<td>'.$my_daily_work[$i]['profile'].'</td>';
                                    echo '<td>'.$my_daily_work[$i]['to_follow'].'</td>';
                                    echo '<td>'.$my_daily_work[$i]['to_unfollow'].'</td>';
                                    if($my_daily_work[$i]['end_date'])
                                        echo '<td>'.date('d-m-Y',$my_daily_work[$i]['end_date']).'</td>';
                                    else
                                        echo '<td>---</td>';
                                echo '</tr>';
                            }                 
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-3"></div>            
    </div>
    
    
        
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">
            <div class="center">
                <h3>Histórico dos Perfis de Referência</h3>
                <br>
                <div style="text-align:left">
                    <table class="table">
                        <?php 
                            echo '<tr class="alert alert-success" style="color:blue">';
                                    echo '<td>No.</td>';
                                    echo '<td>Dumbu ID</td>';
                                    echo '<td>Profile</td>';
                                    /*echo '<td>A seguir</td>';
                                    echo '<td>A deseguer</td>';
                                    echo '<td>Seguidos todos</td>';*/
                                    echo '<td>Status</td>';
                                    
                            echo '</tr>';
                                
                            $n=count($my_daily_work);
                            for($i=0;$i<$n;$i++){
                                echo '<tr>';
                                    echo '<td>'.($i+1).'</td>';
                                    echo '<td>'.$my_daily_work[$i]['id'].'</td>';
                                    echo '<td>'.$my_daily_work[$i]['profile'].'</td>';
                                    /*echo '<td>'.$my_daily_work[$i]['to_follow'].'</td>';
                                    echo '<td>'.$my_daily_work[$i]['to_unfollow'].'</td>';
                                    if($my_daily_work[$i]['end_date'])
                                        echo '<td>'.date('d-m-Y',$my_daily_work[$i]['end_date']).'</td>';
                                    else
                                        echo '<td>---</td>';*/
                                    echo '<td style="color:green">ACTIVE</td>';
                                echo '</tr>';
                            }                            
                            $n=count($canceled_profiles);
                            for($i=0;$i<$n;$i++){
                                echo '<tr>';
                                    echo '<td>'.($i+1).'</td>';
                                    echo '<td>'.$canceled_profiles[$i]['id'].'</td>';
                                    echo '<td>'.$canceled_profiles[$i]['insta_name'].'</td>';
                                    /*echo '<td>---</td>';
                                    echo '<td>---</td>';   
                                    if($canceled_profiles[$i]['end_date'])
                                        echo '<td>'.date('d-m-Y',$canceled_profiles[$i]['end_date']).'</td>';
                                    else
                                        echo '<td>---</td>';*/
                                    echo '<td style="color:red">UNACTIVE</td>';
                                echo '</tr>';
                            }                            
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-3"></div>            
    </div>