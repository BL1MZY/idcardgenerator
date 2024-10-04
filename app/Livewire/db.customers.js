db.customers.aggregate([{
        $project: {
            "name": 1,
            'address': 1,
            'accounts': 1,
        }
    },
    {
        $limit: 3
    }
])


db.customers.aggregate([{
        $sort: { "name": -1 }
    },
    {
        $project: {
            "name": 1,
            'address': 1,
            'accounts': 1,
        }
    },
    {
        $limit: 3
    }
])


db.transactions.aggregate([
    { $match: { account_id: 443178 } },

    {
        $project: {
            transaction_count: 1,

            account_id: 1,
        }
    },

    { $limit: 2 }

])


db.users.insertMany([{
        name: 'Aaron Dikko',
        email: 'iaarondikko@gmail.com',
    }, {
        name: 'Uren Akim',
        email: 'urenakim@gmail.com',
    }, {
        name: 'James ibrahim',
        email: 'james@gmail.com',
    },
    {
        name: 'Tobi Ahmed',
        email: 'jtobi@gmail.com',
    }
])


db.users.aggregate([{
        $addFields: {
            password: { $avg: '$age' }
        }
    },
    {
        $project: {
            "name": 1,
            'password': 1,
            'email': 1,
        }
    },
    {
        $limit: 9
    }
])

db.data.aggregate([
    { $match: { type: "FM-13" } },
    { $count: "counter" }
])

db.address.aggregate([{
        $lookup: {
            from: "users",
            localField: "user_id",
            foreignField: "_id",
            as: 'user_details',
        },
    },
    {
        $limit: 2
    }
])


db.address.insertOne({
    user_id: ObjectId(
        '668857b166dfa320818241af'),
    address: 'Karu  Nasarawa state'
});

db.address.aggregate([{
    $group: {
        _id: "$cart_details",
        properties: {
            $push: {
                'cart_id': '$cart_id',
                'price': '$price',
                'discount': '$discount',
            }
        }
    }
}, {
    $out: 'user_cart'
}])


db.users.aggregate([{
        $search: {
            text: {
                query: 'iaarondikko@gmail.com',
                path: 'email',
            }
        }
    },
    {
        $project: {
            name: 1,
        }
    }
])



db.createCollection('orders', {
    validator: {
        $jsonSchema: {
            bsonType: "object",
            required: ['cart_id', 'price', 'address'],
            properties: {
                cart_id: {
                    bsonType: "int",
                    description: "The cart id should be an integer number",
                },
                price: {
                    bsonType: "double",
                    description: "The price should must be a number",
                },
                address: {
                    bsonType: 'string',
                    description: "Address cannot be empty",
                },
                date: {
                    bsonType: 'date',
                    description: "The date field is optional",
                }
            }
        }
    }
})