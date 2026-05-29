import http from 'node:http';
import handleForm from "./func.mjs";

const server = http.createServer(
    ( request, response ) => {
        if ( request.method === 'POST' && request.url === '/submit' ) {

            let body = '';
            request.on( 'data', chunk => body += chunk.toString() );

            request.on( 'end', async _ => {
                const params = new URLSearchParams( body )
                const text = params.get('request') || 'Default';

                const result = await handleForm( text );

                response.statusCode = result.status;
                response.setHeader( 'Content-Type', 'text/plain' );
                response.end( result.message );
            });

            return;
        }
        response.statusCode = 404;
        response.end(`Oh no...`);
    }
);

server.listen(3000, () => {
    console.log('Listening on http://localhost:3000');
});