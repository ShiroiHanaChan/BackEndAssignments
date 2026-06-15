"use strict";

import { Response } from "../types/requestResponse";
import {readFile, loadFavicon} from "../func/fileSystem";
import {returnQuery} from "../func/dbQuery";

export async function get (
    route : string[] | string = '/',
    response : Response
) : Promise<void> {

    switch ( route[0] ) {

        case '/':
            response.writeHead( 200, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( 'Hello /!' )
            return;

        case 'submit':
            response.writeHead( 200, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( 'Hello /submit!' )
            return;

        case 'logs':
            const logs = await readFile( 'logs.txt' );
            response.writeHead( 200, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( logs );
            return;

        case 'books':
            const booksQuery = await returnQuery( 'select * from Books' );
            response.writeHead( 200, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( JSON.stringify( booksQuery[0] ) );
            return;

        case 'books/stock':
            const stockQuery = await returnQuery( 'select * from Books where stock < 6' );
            response.writeHead( 200, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( JSON.stringify( stockQuery[0] ) );
            return;

        case 'authors':
            // Total hack
            const getAuthorQuery = async ( route : string[] | string ) => {
                if ( route[1] !== undefined ) {
                    return await returnQuery( `select Books.Title, Authors.Id from Books join Authors on Books.Author_Id = Authors.Id where Authors.Id = ${route[1]}` );

                } else {
                    return await returnQuery( 'select * from Authors' );
                }
            }

            const authorQuery = await getAuthorQuery( route );
            response.writeHead( 200, {
                'Content-Type': 'application/json; charset=utf-8'
            } );
            response.end( JSON.stringify( authorQuery[0] ) );
            return;

        case 'favicon.ico':
            const favicon = await loadFavicon();
            response.writeHead( 200, {
                'Content-Type': 'image/webp'
            } );
            response.end( favicon );
            return;

        default:
            throw new Error(`Route not found: '${route}'`);
    }
}