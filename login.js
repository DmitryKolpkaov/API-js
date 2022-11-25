
(async()=>{

    const { Client } = require('amocrm-js');

    const client = new Client({
        // логин пользователя в портале, где адрес портала domain.amocrm.ru
        domain: 'dimas1gold.amocrm.ru', // может быть указан полный домен вида domain.amocrm.ru, domain.amocrm.com
        /*
          Информация об интеграции (подробности подключения
          описаны на https://www.amocrm.ru/developers/content/oauth/step-by-step)
        */
        auth: {
            client_id: '326b4200-9c80-401a-87a6-4bb27838a9bc', // ID интеграции
            client_secret: 'Luf12S2SnHnJy9FD2RRFHNoXEANHGb64SqtkWFcyUdgQBru9ESQuU9a1mNtI0epK', // Секретный ключ
            redirect_uri: 'https://localhost.com', // Ссылка для перенаправления
            code: 'def502005531e3cc4edb54f77eee1562ea553afd05d2352b2558b7610d7d28f117fde3f403eb3413e4f68af36d4450cfcb9f6f3a08a851b240e5af5410cf422d2634db3ec665270d26264ccadb97e7a21b320c3feb75f1cf8e879a9090fe90351411433e03f009427f714ccf18f05b6f78f17bc29588573178f16b26559bbeaa979dd369c28627950cf425bb3f9b1c4475718fb2fdc5ec8313758041eab47adea402646e6ab61de49d0455e6cef6b71c6bc8c4c329fd8d3374ba60cdc8b9b6969bfa980c7325db3c5842640feff33c6efb70c173882678f267a1d6ae765aae5d9479551e16a02bd30e929058e6e163fffd8ae0fa2ef68d1bf9ed361240e973c63edfc29d83c200958895b20d455e21f38dbf333f16c0a2659af81628bd08294b1fead51dd455e684d2741177aa2bb15c4f4ee6c6bce32d446e6e65e2e3026a5a69515e6bbe894c867b50252c9254d80b371a80e09cc96c0f91b67ac592a6167499c7c443869d1c4b6c05b1ccbb6f783b435d5c357cce1679c26c23de464d65eb2b88ffb545fd60e937a26c9b0f1525dc8a41ad99e82e3a4512979238c778eaa9089194ffd857f57996cbe274fda405141c09eb51f0d24bcbb155e598ee60b7a94242c82065e2f4013797f6809666aaee9a3c06679363', // Код для упрощённой авторизации, необязательный
        },

    });


    let result = await client.request.make('GET', '/api/v4/contacts', {with: 'leads'});


    let finishTaskDate = new Date();
    finishTaskDate.setDate(finishTaskDate.getDate()+1);

    let task = [];

    for (let i = 0; i < result.data._embedded.contacts.length; i++) {

                let contact = result.data._embedded.contacts[i];

                let leads = contact._embedded.leads;

                if (leads.length  === 0){
                    console.log('Для контакта "'+contact.name+ '" будет создана задача')

                    task.push({
                        entity_id: contact.id,
                        entity_type: 'contacts',
                        text: 'TEST',
                        complete_till: Math.floor(finishTaskDate.getTime()/1000)
                    });

                }
    }

    await client.request.make('POST', '/api/v4/tasks', task);


})()






