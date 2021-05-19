<?php

namespace App\Controller;
use App\Entity\Cadastro;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;

$package = new Package(new EmptyVersionStrategy());

class DefaultController extends AbstractController
{
    /**
     * @Route("/", methods={"GET","POST"}, name="index")
     */
    public function index(): Response
    {
       return $this->Render("menew.html.twig");
    } 

    /**
     * @Route("/cadastro", methods={"GET","POST"}, name="cadastro")
     */
    public function cadastro(): Response
    {
       return $this->Render("cadastro.html.twig");
    } 

    /**
     * @Route("/consulta", methods={"GET","POST"}, name="consulta")
     */
    public function consulta(): Response
    {
       return $this->Render("consulta.html.twig");
    } 

    /**
     * @Route("/quemsomos", methods={"GET","POST"}, name="quemsomos")
     */
    public function quemsomos(): Response
    {
       return $this->Render("quemsomos.html.twig");
    } 

    /**
     * @Route("/sair", methods={"GET","POST"}, name="sair")
     */
    public function sair(): Response
    {
        die("Agradecemos a sua visita, até logo!");       
    } 


    /**
     * @Route("/salvar", methods={"POST","GET"}, name="salvar")
     */
    public function salvar(Request $request): Response
    {
        // Recebe os dados do formulário
        $dados = $request->request->all();

        // Atribui os valores dos forms as variáveis
        $usuario = new Cadastro;
        $usuario->setNome($dados['nome']);
        $usuario->setEmail($dados['email']);
        $usuario->setTelefone($dados['telefone']);
        $usuario->setCidade($dados['cidade']);
        $usuario->setEstado($dados['estado']);
        $usuario->setCategoria($dados['categoria']);

        // Pegar o gerenciador de Entidades (Tabela/Registro)
        $doctrine = $this->getDoctrine()->getManager();
        // Preparar as querys
        $doctrine->persist($usuario);
        // Execute
        $doctrine->flush();

        if ( $usuario->getId() ) 
        {
            return $this->render("sucesso.html.twig",[
                "fulano" => $dados['nome']
            ]);
        } 
        else
        {
            return $this->render("erro.html.twig",[
                "fulano" => $dados['nome']
            ]);
        }    

    }

    /**
     * @Route("/consultar", methods={"POST","GET"}, name="consultar")
     */
    public function consultar(Request $request): Response
    {
        $dados = $request->request->all();
        $usuario = new Cadastro;     
        $usuario->getId($dados['id']);   
        $doctrine_gm = $this->getDoctrine()->getManager();
        $doctrine_gr = $this->getDoctrine()->getRepository(Cadastro::class);         
        $u = $doctrine_gr->findBy($request->request->all());
        
        // Retorno na API
        dump($doctrine_gr->findBy($request->request->all()));     
        
        // Retorno no HTML        
        return $this->render('id.html.twig',[            
            'msg' => $u,
            'count' => count($u)
        ]);
        
        

    }    
}