"use strict";

import * as http from "node:http";

import { get } from './routes';
import {analyzeURL} from "./func/utils";
import {registerLog} from "./func/fileSystem";

const port = 3000;

const server = http.createServer(
    async ( request, response ) => {

        const submit = analyzeURL( request.url );

        try {

            await get( submit, response );
            await registerLog( submit, 200, 'Success' );

        } catch ( error ) {

            response.writeHead( 404, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( 'No route' );
            await registerLog( submit, 404, error );

        }
    }
)

server.listen( port, () : void => { console.log( 'Listening on port:', port ) } );