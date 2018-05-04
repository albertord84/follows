<?php
$index=2; //1: portuguese, 2: english
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
    case "pt":
        $index=1;
        break;
    case "en":
        $index=2;
        break;        
    default:
        break;
}

$idioma=array();

// 1:portugues; 2:ingles


// PAGINAS EXTERNAS
$idioma['t_inicio'][1]="Início"; 
$idioma['t_inicio'][2]="Home";

$idioma['b_i_timagens_mastologicas'][1]="Banco de dados de imagens mastológicas"; 
$idioma['b_i_timagens_mastologicas'][2]="Database of mastologic images"; 

$idioma['b_i_imagens_mastologicas'][1]="DMR - Database For Mastology Research é uma plataforma online que armazena e gerencia imagens mastológicas, para a detecção precoce de câncer de mama. Aqui são disponibilizados imagens térmicas, mamografias, ressonância magnética e imagens de ultrasom obtidas por nosso grupo de pesquisa.";
$idioma['b_i_imagens_mastologicas'][2]="DMR - Database For Mastology Research is an online platform that stores and manages mastologic images for early detection of breast cancer. Here are made available thermal imaging, mammography, MRI and ultrasound images obtained by our research group.";

$idioma['b_i_timagens_termicas'][1]="Imagens térmicas";
$idioma['b_i_timagens_termicas'][2]="Thermal imaging";

$idioma['b_i_imagens_termicas'][1]='Termografia é um exame fisiológico, não invasivo e sem uso de radiações ionizantes. Possibilita a detecção de tumores mamários, muito antes que qualquer outro método, ainda quando as células produzem substâncias responsáveis pela criação de neovascularização que alimentará o futuro tumor.'; 
$idioma['b_i_imagens_termicas'][2]='Thermography is a non-invasive and without the use of ionizing radiation physiological examination. It enables the detection of breast tumors, long before any other method, while the cells are still producing substances responsible for the creation of neovascularization that will "feed" the future tumor.'; 

$idioma['b_i_tprontuarios_medicos'][1]="Prontuários médicos"; 
$idioma['b_i_tprontuarios_medicos'][2]="Medical records"; 

$idioma['b_i_prontuarios_medicos'][1]="O prontuário médico é um elemento fundamental no atendimento médico e reúne informações que resumem o histórico e garantem a continuidade do tratamento. Nosso banco de dados são apresentados de maneira anônima um conjunto de pacientes com seus respectivos exames para serem analisados."; 
$idioma['b_i_prontuarios_medicos'][2]="The medical record is a key element in the medical care and gathers information that summarize the medical history and ensure continuity of treatment. In our database a set of patients with the respective tests for analysis are presented anonymously."; 

$idioma['b_i_tmamografias'][1]="Mamografias"; 
$idioma['b_i_tmamografias'][2]="Mammograms"; 

$idioma['b_i_mamografias'][1]="A mamografia é um exame que permite visualizar as estruturas internas da mama, destacando principalmente as microcalcificações. Atualmente a mamografia é a principal forma de diagnosticar distúrbios mamários."; 
$idioma['b_i_mamografias'][2]="Mammography is a test that allows you to view the internal structures of the breast, especially highlighting the microcalcifications. Currently mammography is the main way to diagnose breast disorders.";


$idioma['t_sobre'][1]="Sobre o projeto";
$idioma['t_sobre'][2]="About the project";

$idioma['b_s_tprocessamento_analise_mastologia'][1]="Processamento e Análise de Imagens Aplicadas à Mastologia";
$idioma['b_s_tprocessamento_analise_mastologia'][2]="Image Processing and Analysis Applied to Mastology";

$idioma['b_processamento_analise_mastologia'][1]="  Os novos equipamentos digitais para aquisição de imagens médicas(câmeras termográficas, ultra-som, mamogramas digitais, etc) nos permitem combinar as informações anatômicas das diversas fontes para as específicidades dos pacientes. Estes dados (imagens) devem ser processados para realçar e extrair características. Nesta área, técnicas de processamento de imagens e reconhecimento de padrões são muito importantes, tanto para automatizar certos procedimentos, quanto para facilitar a interação e combinação dos dados. <br/><br/>
                                                    A proposta desta pesquisa é auxiliar no diagnóstico por imagens médicas através da integração das principais etapas do processamento de imagens aos métodos de extração de características e conhecimento, visando a interpreção das imagens, a identificação de tecidos e estruturas anatômicas e funcionais. Neste sentido, buscamos conduzir as pesquisas ao problema de auxiliar nos diagnósticos precoces e na classificação de patologias(benignas/malignas) da mama. O projeto vai desde a aquisição das imagens e sua organização em bancos de dados, passando pela suas análises através de métodos numéricos, até um último estágio, onde técnicas de aprendizado de máquina devem ser utilizadas de forma a ser feita uma extração de conhecimento das Imagens de Mamas.<br/><br/>
                                                    Câmera usada no projeto FLIR SC-620, <br/>
                                                    Resolução 640 x 480: Pixel = 45 μm";
                                                   
$idioma['b_processamento_analise_mastologia'][2]="  The new digital equipment to acquire medical images (thermographic cameras, ultrasound, digital mammograms, etc.) allow us to combine anatomical information from various sources to the specific characteristics of the patients. These data (images) must be processed to enhance and extract features.  In this area, image processing and pattern recognition techniques are very important, both to automate certain procedures and to facilitate the interaction and combination of data. <br/><br/>
                                                    The purpose of this research is to assist in medical imaging diagnosis by integrating the main steps of image processing methods of feature extraction and knowledge in order to interpret images, identification of tissues and anatomical and functional structures. In this sense, we seek to conduct research to assist in the early diagnosis of problems and breast diseases classification (benign / malignant). The project goes from the acquisition of the images and their organization in databases, through their analysis using numerical methods, to a last stage, where machine learning techniques should be used in order to be made an  extraction of knowledge from the breast images.<br/><br/>
                                                    Camera used in the project FLIR SC-620 <br/>
                                                    Resolution 640 x 480: Pixel = 45 μm";
                                            
$idioma['b_s_site_manual'][1]="Site e manual:";
$idioma['b_s_site_manual'][2]="Site and manual:";

$idioma['b_s_aqui'][1]="Aqui";
$idioma['b_s_aqui'][2]="Here";

$idioma['t_contatos'][1]="Contatos";
$idioma['t_contatos'][2]="Contact";

$idioma['b_c_como_chegar'][1]="Como chegar";
$idioma['b_c_como_chegar'][2]="How to get";

$idioma['b_c_exibir_mapa'][1]="Exibir mapa ampliado";
$idioma['b_c_exibir_mapa'][2]="View larger map";

$idioma['t_usuario'][1]="Usuário:";
$idioma['t_usuario'][2]="User:";

$idioma['t_senha'][1]="Senha:";
$idioma['t_senha'][2]="Password:";

$idioma['t_acessar'][1]="Acessar";
$idioma['t_acessar'][2]="Access";

 $idioma['t_criarconta'][1]="Criar conta";
 $idioma['t_criarconta'][2]="Create account";

 $idioma['b_c_novousuario'][1]="Cadastro de novo usuário";
 $idioma['b_c_novousuario'][2]="New user registration";

 $idioma['b_c_email'][1]="Email:";
 $idioma['b_c_email'][2]="Email:";

 $idioma['b_c_senha'][1]="Senha:";
 $idioma['b_c_senha'][2]="password:";

 $idioma['b_c_rsenha'][1]="Repetir senha:";
 $idioma['b_c_rsenha'][2]="Repeat password:";

 $idioma['b_c_tusuario'][1]="Tipo Usuário:";
 $idioma['b_c_tusuario'][2]="User type:";

 $idioma['b_c_tpesquisador'][1]="Pesquisador";
 $idioma['b_c_tpesquisador'][2]="Research";
 
 $idioma['b_c_testudante'][1]="Estudante";
 $idioma['b_c_testudante'][2]="Student";

 $idioma['b_c_tmedico'][1]="Médico";
 $idioma['b_c_tmedico'][2]="Doctor";

 $idioma['b_c_toutro'][1]="Outro";
 $idioma['b_c_toutro'][2]="Other";

 $idioma['b_c_nome'][1]="Nome:";
 $idioma['b_c_nome'][2]="Name:";

 $idioma['b_c_instituicao'][1]="Instituição:";
 $idioma['b_c_instituicao'][2]="Institution:";

 $idioma['b_c_cidade'][1]="Cidade:";
 $idioma['b_c_cidade'][2]="City:";

 $idioma['b_c_pais'][1]="País:";
 $idioma['b_c_pais'][2]="Country:";

 $idioma['b_c_verificacao'][1]="Verificação:";
 $idioma['b_c_verificacao'][2]="Verification:";

 $idioma['b_c_aceito'][1]="Aceito os";
 $idioma['b_c_aceito'][2]="I accept the ";

 $idioma['b_c_termos_condicoes'][1]="termos e condições ";
 $idioma['b_c_termos_condicoes'][2]="terms and conditions ";

 $idioma['b_c_uso'][1]="de uso";
 $idioma['b_c_uso'][2]="of use";

 $idioma['b_c_termos_condicoes_uso'][1]="Termos de condições de uso:";
 $idioma['b_c_termos_condicoes_uso'][2]="Under conditionsof use:";

 $idioma['b_c_texto_termos_condicoes_uso'][1]='Para acessar ao banco de datos DMI "Database for Mastological Images" só será necessário fazer o cadastro nosso sistema.<br/><br/>
                                               Ao usar ou acessar ao nosso sistema o usuário concorda  explicitamente com todas as condições de uso sujeitas como a seguir:<br/><br/>
                                               - A senha pessoal dos usuários é armazenada de forma criptografada de modo  tal que o mesmo administrador do sistema não tem acesso a esse dado. Nesta  última parte, caso os usuários esqueçam-se de sua senha de acesso, eles poderão  recuperar-la fornecendo seu email e o sistema enviará ao email fornecido um  link que facilitara a mudança da nova senha.<br/><br/>
                                               - O usuário é inteiramente  responsável por tomar todas as providências cabíveis para assegurar que nenhuma  outra pessoa tenha acesso à sua conta ou senha no sistema.<br/><br/>
                                               - O uso do banco de dados só pode ser usado para fins de pesquisa devendo referennciar um o mais de nossas publicações em qualquer produção científica que faça uso das imagens ou dados publicados nosso sistema.';
 $idioma['b_c_texto_termos_condicoes_uso'][2]='To access the DMI data of bank " Database for Mastological Images " is required only placing the order our system.<br/><br/>
                                               By using or accessing our system the user explicitly agrees to all conditions of use subject as follows:<br/><br/>
                                               - The personal password of users is stored in encrypted form such that the same system administrator does not have access to this data . In this last part , if users forget is your password , they can retrieve it by providing your email address and the system will send to the email provided a link that facilitated the change the new password.<br/><br/>
                                               - The user is fully responsible for taking all reasonable measures to ensure that no other person has access to your account or password in the system.<br/><br/>
                                               - The database use can only be used for research purposes should referennciar a most of our publications in any scientific making use of the images or data published our system.';
           

 $idioma['b_c_continuar'][1]="Continuar";
 $idioma['b_c_continuar'][2]="Continue";

 $idioma['b_c_tverificacaoemail'][1]="Verifição do email";
 $idioma['b_c_tverificacaoemail'][2]="Verification email";

 $idioma['b_c_verificacaoemail'][1]="Um código de segurança foi enviado a seu email, favor revise as entradas do seu email inclusive a sua caixa de Spam.";
 $idioma['b_c_verificacaoemail'][2]="A security code is sent to your email , please review the entries from your email including your Spam box.";

 $idioma['b_c_login'][1]="Bem-vindo a Visual Lab, agora você pode fazer login";
 $idioma['b_c_login'][2]="Welcome to Visual Lab , you can now login";

 $idioma['t_entrar'][1]="Entrar";
 $idioma['t_entrar'][2]="Enter";

 $idioma['t_recuperarsenha'][1]="Recuperar senha";
 $idioma['t_recuperarsenha'][2]="Recover password";

 $idioma['b_r_tverificacao_email'][1]="Verifição do email";
 $idioma['b_r_tverificacao_email'][2]="Verification email";
 
 $idioma['b_r_verificacao_email'][1]="Para recuperar sua senha insira seu email e depois revise sua caixa de entrada";
 $idioma['b_r_verificacao_email'][2]="To recover your password enter your email address and then review your inbox";

 $idioma['b_r_email_nao_encontrado'][1]="O email não foi encontrado encontrado, por favor insira novamente.";
 $idioma['b_r_email_nao_encontrado'][2]="The email was not found found, please enter again.";
 
 $idioma['b_r_enviar'][1]="Enviar";
 $idioma['b_r_enviar'][2]="Send";

 $idioma['b_r_senha_modificada'][1]="Sua senha foi modificada!";
 $idioma['b_r_senha_modificada'][2]="Your password has been modified!";

 $idioma['b_r_login_aqui'][1]="Faça login aqui";
 $idioma['b_r_login_aqui'][2]="Login here";

 $idioma['b_r_msg_sucesso'][1]="Mensagem enviada com sucesso!";
 $idioma['b_r_msg_sucesso'][2]="Message sent successfully!";

 $idioma['b_r_verifique_email'][1]="Por favor, verifique seu email";
 $idioma['b_r_verifique_email'][2]="Please, check your email";

 $idioma['b_r_nova_senha'][1]="Crie uma nova senha";
 $idioma['b_r_nova_senha'][2]="Create a new password";

 $idioma['b_r_cod_seg_email'][1]="Um código de segurança foi enviado a seu email, favor revise as entradas do seu email inclusive a sua caixa de Spam.";
 $idioma['b_r_cod_seg_email'][2]="A security code is sent to your email, please review the entries from your email including your Spam box.";

//FIM PAGINAS EXTERNAS

//PAGINAS INTERNAS

 $idioma['b_inicial'][1]="Inicial";
 $idioma['b_inicial'][2]="Home";

 $idioma['b_i_dmr'][1]="DMR - Database For Mastology Research é uma plataforma online que armazena e gerencia imagens mastológicas, para a deteção precoce de câncer de mama. Aquí são disponibilizados imagens térmicas, mamografias, ressonâcia magnética e imagens de ultrasom, obtidas por nosso grupo de pesquisa.";
 $idioma['b_i_dmr'][2]="DMR - Database For Mastology Research is an online platform that stores and manages mastologic images for early detection of breast cancer. Here are made available thermal imaging, mammography, MRI and ultrasound images obtained by our research group";

 $idioma['b_i_lista_pacientes'][1]="Lista de pacientes";
 $idioma['b_i_lista_pacientes'][2]="List of Patients";

 $idioma['b_i_lista_imagens'][1]="Lista de imagens";
 $idioma['b_i_lista_imagens'][2]="Image list";

 $idioma['b_i_pesquisa_avancada'][1]="Pesquisa avançada";
 $idioma['b_i_pesquisa_avancada'][2]="Advanced search";

 $idioma['b_i_Paquisicao'][1]="Protocolo aquisição";
 $idioma['b_i_Paquisicao'][2]="Protocol acquisition";

 $idioma['b_i_Gconta'][1]="Gerencie sua conta";
 $idioma['b_i_Gconta'][2]="Manage Your Account";

 $idioma['b_i_Gprojetos'][1]="Gerenciar projetos";
 $idioma['b_i_Gprojetos'][2]="Manage projects";

 $idioma['b_i_Ccoordinador'][1]="Contatar coordinador";
 $idioma['b_i_Ccoordinador'][2]="Contact coordinator";

 $idioma['b_i_Csuporte'][1]="Contatar suporte";
 $idioma['b_i_Csuporte'][2]="Contact Support";


 $idioma['b_i_camera'][1]="Câmera usada no projeto FLIR SC-620, <br/><br/>
                           Resolução 640 x 480: Pixel = 45 μm <br/><br/>
                           Site e manual: Aqui";
 $idioma['b_i_camera'][2]="Camera used in the project FLIR SC-620 <br/><br/>
                           Resolution 640 x 480: Pixel = 45 μm <br/><br/>
                           Website and manual: Here";

 $idioma['b_i_direitos'][1]="O material de este site tem a finalidade de pesquisa, por nehum motivo é permitido a venda o transmisão a terceiros.";
 $idioma['b_i_direitos'][2]="The material of this site is intended to search for match any reason is allowed to sell transmission to third parties.";

 $idioma['b_pacientes'][1]="Pacientes";
 $idioma['b_pacientes'][2]="Patients";

 $idioma['b_p_mostrar'][1]="Mostrar:";
 $idioma['b_p_mostrar'][2]="Demonstrate:";

 $idioma['b_p_tpacientes'][1]="Pacientes";
 $idioma['b_p_tpacientes'][2]="Patients";

 $idioma['b_pacientes'][1]="Todas as pacientes";
 $idioma['b_pacientes'][2]="All patients";

 $idioma['b_p_pacientesmamografia'][1]="Pacientes com mamografia";
 $idioma['b_p_pacientesmamografia'][2]="Patients with mammography";

 $idioma['b_p_pacientesultrassom'][1]="Pacientes com ultrassom";
 $idioma['b_p_pacientesultrassom'][2]="Patients with ultrasound";

 $idioma['b_p_pacientesressonancia'][1]="Pacientes com ressonância magnética";
 $idioma['b_p_pacientesressonancia'][2]="Patients with magnetic resonance";

 $idioma['b_p_pacientessemexame'][1]="Pacientes sem exame";
 $idioma['b_p_pacientessemexame'][2]="Patients without examination";

 $idioma['b_p_diagnostico'][1]="Diagnóstico:";
 $idioma['b_p_diagnostico'][2]="Diagnostic:";

 $idioma['b_p_todos'][1]="Todos";
 $idioma['b_p_todos'][2]="All";

 $idioma['b_p_saudavel'][1]="Saudável";
 $idioma['b_p_saudavel'][2]="Sealthy";

 $idioma['b_p_doente'][1]="Doente";
 $idioma['b_p_doente'][2]="Sick";

 $idioma['b_p_desconhecido'][1]="Desconhecido";
 $idioma['b_p_desconhecido'][2]="Unknown";

 $idioma['b_p_ordenar'][1]="Ordenar por:";
 $idioma['b_p_ordenar'][2]="Sort by:";

 $idioma['b_p_idade'][1]="Idade";
 $idioma['b_p_idade'][2]="Age";

 $idioma['b_p_data'][1]="Data";
 $idioma['b_p_data'][2]="Date";

 $idioma['b_p_nome'][1]="Nome";
 $idioma['b_p_bome'][2]="Name";

 $idioma['b_imagens'][1]="Imagens";
 $idioma['b_imagens'][2]="Image";

 $idioma['b_im_termografias'][1]="Termografias";
 $idioma['b_im_termografias'][2]="Thermography";

 $idioma['b_im_protocolo'][1]="Protocolo:";
 $idioma['b_im_protocolo'][2]="Protocol:";

 $idioma['b_im_estatico'][1]="Estático";
 $idioma['b_im_estatico'][2]="Static";

 $idioma['b_im_dinamico'][1]="Dinâmico";
 $idioma['b_im_dinamico'][2]="Dynamic";

 $idioma['b_im_livre'][1]="Livre";
 $idioma['b_im_livre'][2]="Free";

 $idioma['b_im_todos'][1]="Todos";
 $idioma['b_im_todos'][2]="All";

 $idioma['b_im_posicao'][1]="Posição:";
 $idioma['b_im_posicao'][2]="Position:";

 $idioma['b_im_frontal'][1]="Frontal";
 $idioma['b_im_frontal'][2]="Front";

 $idioma['b_im_LD45'][1]="Lateral Dir 45°";
 $idioma['b_im_LD45'][2]="Right side 45°";

 $idioma['b_im_LD90'][1]="Lateral Dir 90°";
 $idioma['b_im_LD90'][2]="Right side 90°";

 $idioma['b_im_LE45'][1]="Lateral Esq 45°";
 $idioma['b_im_LE45'][2]="Left side 45°";

 $idioma['b_im_LE90'][1]="Lateral Esq 90°";
 $idioma['b_im_LE90'][2]="Left side 90°";

 $idioma['b_im_outra'][1]="Outra";
 $idioma['b_im_outra'][2]="Other";

 $idioma['b_im_todas'][1]="Todas";
 $idioma['b_im_todas'][2]="All";

 $idioma['b_im_raca'][1]="Raça:";
 $idioma['b_im_raca'][2]="Race:";

 $idioma['b_im_amarela'][1]="Amarela";
 $idioma['b_im_amarela'][2]="Yellow";

 $idioma['b_im_branca'][1]="Branca";
 $idioma['b_im_branca'][2]="White";

 $idioma['b_im_indigena'][1]="Indígena";
 $idioma['b_im_indigena'][2]="Indian";

 $idioma['b_im_negra'][1]="Negra";
 $idioma['b_im_negra'][2]="Black";

 $idioma['b_im_mamografias'][1]="Mamografias";
 $idioma['b_im_mamografias'][2]="Mammograms";

 $idioma['b_im_CNE'][1]="Crânio caudal esquerdo";
 $idioma['b_im_CNE'][2]="Skull left caudal";

 $idioma['b_im_MLOE'][1]="Médio lateral oblíquo esquerdo";
 $idioma['b_im_MLOE'][2]="East Side left oblique";

 $idioma['b_im_CND'][1]="Crânio caudal direito";
 $idioma['b_im_CND'][2]="Skull right caudal";

  $idioma['b_im_MLOD'][1]="Médio lateral oblíquo direito";
 $idioma['b_im_MLOD'][2]="East Side right oblique";

 $idioma['b_busca_avancada'][1]="Busca Avançada";
 $idioma['b_busca_avancada'][2]="Advanced Search";

 $idioma['b_textobusca'][1]="Texto a buscar";
 $idioma['b_textobusca'][2]="Text to search";

 $idioma['b_exame'][1]="Exame:";
 $idioma['b_exame'][2]="Exam:";

 $idioma['b_mamografia'][1]="Mamografia";
 $idioma['b_mamografia'][2]="mammography";

 $idioma['b_biopsia'][1]="Biópsia";
 $idioma['b_biopsia'][2]="Biopsy";

 $idioma['b_ultrassom'][1]="Ultrassom";
 $idioma['b_ultrassom'][2]="Ultrasound";

 $idioma['b_ressonanciaM'][1]="Ressonância Magnética";
 $idioma['b_ressonanciaM'][2]="Magnetic Resonance";

 $idioma['b_idade_entre'][1]="Idade entre:";
 $idioma['b_idade_entre'][2]="Age between";

 $idioma['b_e'][1]="e";
 $idioma['b_e'][2]="and";

// Fundo

$idioma['f_end'][1]="No Visual Lab trabalham alunos e pesquisadores do departamento de Ciência da Computação (IC/UFF)."; 
$idioma['f_end'][2]="Students and researchers from the Computer Science department (IC / UFF) work in Visual Lab.";
 
$idioma['f_end2'][1]="Nossa principal área de atuação consiste em Visão de Máquina e Visualização, análise e processamento de imagens, mining de imagens em bancos de dados, cores e algoritmos gráficos. Outras áreas incluem aplicações em geoprocessamento, auxílio à diagnósticos por imagens médicas e entretenimento."; 
$idioma['f_end2'][2]="Our main area of expertise is Machine Vision and Visualization, image analysis and processing, mining of images in databases, colors and graphics algorithms. Other areas include applications in geoprocessing, aid to diagnostic by medical imaging and entertainment.";

$idioma['f_end_endereco'][1]="Endereço";
$idioma['f_end_endereco'][2]="Address";

$idioma['f_end_membros'][1]="Membros";
$idioma['f_end_membros'][2]="Members";

$idioma['f_end_contato'][1]="Contato";
$idioma['f_end_contato'][2]="Contact";

$idioma['f_end_suporte'][1]="Suporte";
$idioma['f_end_suporte'][2]="Holder";

function traduzir($texto){
	global $idioma;
  global $index;
	echo $idioma[$texto][$index];
}
//traduzir('f_end');
// t: topo; b:body; f: footer:
 ?>