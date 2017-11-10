# Cli commands

## CheckNamesInTextCommandTest
This command check if “John” and “Mary” names are found the same number of times inside the provided text. If the number of times is the same it should return 1, if not it should return 0.

Command can be run in cli:
```
php bin/console string:check-name "Some text"
```
To check string replace **Some text** your own string.

### Unit test for command
Too use UnitTest for this command you can use command:
```
phpunit tests/AppBundle/Command/CheckNamesInTextCommandTest.php
```

## SortProductsCommand
This command will be sort product list in JSON. It should return array of JSON string with products sorted by price ascending, and if price is the same sorted alphabetically ascending.

Command can be run in cli:
``` 
php bin/console products:sort 'JSON'
```
Replace **JSON** your JSON code to sort.

Example structure of product list:
```
[	
	{
		"title": "H&M T-Shirt White",
		"price": 10.99,
		"inventory": 10
	},
	{
		"title": "Magento Enterprise License",
		"price": 1999.99,
		"inventory": 9999
	},
	{
		"title": "iPad 4 Mini",
		"price": 500.01,
		"inventory": 2
	},
	{
		"title": "iPad Pro",
		"price": 990.20,
		"inventory": 2
	},
	{
		"title": "Garmin Fenix 5",
		"price": 789.67,
		"inventory": 34
	},
	{
		"title": "Garmin Fenix 3 HR Sapphire Performer Bundle",
		"price": 789.67,
		"inventory": 12
	}
] 
```

Example of use command:
``` 
php bin/console products:sort '[{"title":"H&M T-Shirt White","price":10.99,"inventory":10},{"title":"Magento Enterprise License","price":1999.99,"inventory":9999},{"title":"iPad 4 Mini","price":500.01,"inventory":2},{"title":"iPad Pro","price":990.2,"inventory":2},{"title":"barmin Fenix 5","price":789.67,"inventory":34},{"title":"armin Fenix 3 HR Sapphire Performer Bundle","price":789.67,"inventory":12}]'
```