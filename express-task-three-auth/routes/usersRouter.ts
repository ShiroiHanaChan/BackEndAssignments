"use strict";

import express, {Request, Response} from 'express';
import requireAuth from "../lib/requireAuth";
import users from '../fixtures/users.json';
import generateID from "../lib/generateID";

interface User {
    "id": number,
    "name": string,
    "age": number,
    "username": string,
    "password": string
}

const usersRouter = express.Router();

const getUsersRoute = ( _request : Request, response : Response ) => {
    response.status( 200 );
    response.json( users );
}

const getUserRoute = ( request : Request, response : Response ) => {
    const params = Number(request.params.id);
    const user = users.find( user => user.id === params );
    if ( user ) {
        response.status( 200 );
        response.json( user );
    } else {
        response.status( 404 );
        response.json( { "message": "User not found!" } );
    }
}

const createUserRoute = ( request : Request, response : Response ) => {
    express.json()( request, response, () => {
        const newUser : User = {
            "id": generateID(),
            ...request.body
        }

        users.push( newUser );

        response.status( 201 );
        response.json( users[ users.length - 1 ] );
    });
}

usersRouter.use( requireAuth );
usersRouter.route( '/' )
        .get( getUsersRoute )
        .post( createUserRoute );

usersRouter.route( '/:id' )
        .get( getUserRoute )

export default usersRouter;