<?php
  //require __DIR__ . '\assets\vendor\autoload.php'; // caminho relacionado a SDK
    require('C:\xampp\htdocs\SoftExpert\vendor\autoload.php');   
   

   use Gerencianet\Exception\GerencianetException;
   use Gerencianet\Gerencianet;

   $clientId = 'seu client id aqui';// insira seu Client_Id, conforme o ambiente (Des ou Prod)
   $clientSecret = 'seu client secret aqui'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
    ];
    
   $item_1 = [
       'name' => 'Item 1', // nome do item, produto ou serviço
       'amount' => 1, // quantidade
       'value' => 10000 // valor (1000 = R$ 10,00) (Obs: É possível a criação de itens com valores negativos. Porém, o valor total da fatura deve ser superior ao valor mínimo para geração de transações.)
   ];
   $items = [
       $item_1
   ];
   $metadata = array('notification_url'=>'https://www.google.com/'); //Url de notificações
   $customer = [
       'name' => 'Leonardo Walkiw', // nome do cliente
       'cpf' => '09361581902', // cpf válido do cliente
       'phone_number' => '42988171323', // telefone do cliente
   ];
   $discount = [ // configuração de descontos
       'type' => 'currency', // tipo de desconto a ser aplicado
       'value' => 599 // valor de desconto 
   ];
   $configurations = [ // configurações de juros e mora
       'fine' => 200, // porcentagem de multa
       'interest' => 33 // porcentagem de juros
   ];
   $conditional_discount = [ // configurações de desconto condicional
       'type' => 'percentage', // seleção do tipo de desconto 
       'value' => 50, // porcentagem de desconto
       'until_date' => '2021-01-30' // data máxima para aplicação do desconto
   ];
   $bankingBillet = [
       'expire_at' => '2021-02-15', // data de vencimento do titulo
       'message' => 'Teste Observação Boleto', // mensagem a ser exibida no boleto
       'customer' => $customer,
       'discount' =>$discount,
       'conditional_discount' => $conditional_discount
   ];
   $payment = [
       'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
   ];
   $body = [
       'items' => $items,
       'metadata' =>$metadata,
       'payment' => $payment
   ];
   try {
     $api = new Gerencianet($options);
     $pay_charge = $api->oneStep([],$body);

     //echo '<pre>';
     //print_r($pay_charge);
     //echo '<pre>';
     if($pay_charge['code'] == 200) {

        $response = array("success" => true);
        echo json_encode($response);
     }
     
    } catch (GerencianetException $e) {
       print_r($e->code);
       print_r($e->error);
       print_r($e->errorDescription);
   } catch (Exception $e) {
       print_r($e->getMessage());
   }