<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Post;

class PostController extends AbstractController {    
    
    /**
     * @Route("/post", name="post", methods={"GET", "HEAD"})
     * @param Request $request
     * @return Response
     */

     public function index(Request $request) : Response {    

        $posts = $this->getDoctrine()->getRepository(Post::Class)->findAll();
        
        return $this->render('Post/index.html.twig', [
            
            'posts' => $posts
        
        ]);

    }

    /**
     * @Route("/post/{id}", name="post.show", methods={"GET", "HEAD"})
     * @param Request $request
     * @return Response
     */
    public function show(int $id) : Response {    

        $post = $this->getDoctrine()->getRepository(Post::Class)->find($id);
        
        return $this->render('Post/show.html.twig', [
            
            'post' => $post
        
        ]);

    }
    
    /**
     * @Route("/post/create", name="post.create", methods={"GET", "HEAD"})
     * @return Response
     */
    public function create() : Response {    

        return $this->render('Post/create.html.twig');

    }
    
    /**
     * @Route("/post", name="post.store", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) : Response {    

        $EM = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setTitle($request->get('post_title'));
        $post->setBody($request->get('post_body'));

        $EM->persist($post);
        $EM->flush();

        return new Response("Added New Post", [
          
            'post' => $post
        
        ]);

    }

    /**
     * @Route("/post/{id}/edit", name="post.edit", methods={"GET", "HEAD"})
     * @param Request $request
     * @return Response
     */
    public function edit(int $id) : Response {    


    }

    /**
     * @Route("/post/update", name="post.update", methods={"PUT", "POST"})
     * @param Request $request
     * @return Response
     */
    public function update(Request $request) : Response {    



    }
    
    /**
     * @Route("/post/delete", name="post.delete", methods={"DELETE", "POST"})
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request) : Response {    



    }    

}
