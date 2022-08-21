# Patterns



## Description
* Implement few patterns from the following list or if you have already used them in your previous tasks then highlight them:

### Abstract Factory: Write a program that can store information about people both in DB and in FS.

The user should choose if he/she wishes to work from FS or DB but that point forward the client code should be identical in both cases. 
The following operations should be supported in the PersonRepository interface:

public function savePerson(Person $person): void

public function readPeople(): array

public function readPerson(string $name): ?Person

### Adapter: Create an implementation for the IntegerStackInterface. Create an adapter for the IntegerStackInterface implementation and the ASCIIStackInterface

IntegerStackInterface:

public function push(int $integer): void;

public function pop(): int

ASCIIStackInterface:

public function push(string $char): void;

public function pop(): ?string;

### Observer: Write a program that scans a given text file and shows details about it. The program should notify any registered listeners with each word scanned.

Types of listeners that are required:

Word counter – that simply counts the total words sent to it.

Number counter – that count the total numbers of string that represents numbers (for example "345", "0")

Longest word keeper – which keeps the last longest word sent to it

Reverse word – which reverses chars order in every given word

### Facade: Create a program that initiates several Person objects using the classes created in the Abstract Factory, and define a class which can do the following operations:

Check which of two persons is smarter by name:
public function whoIsTheSmarter(
string $person1Name>
string $person2Name
): Person

Move some IQ from one person to another by name and store the changes
public function transferIq(
string $fromName,
string $toName,
int $amountToTransfer
): void

Increment or reduce a person's IQ by name and store the changes
public function changeIqByDelta(string $personName, int $delta): void

If a person with that name couldn’t be found, then an exception should be thrown.

If multiple persons are found with that name, then the operation should be done on the first one.

### Composite: Create a program that reflects a hierarchical file system. Create the following:

FileSystemEntity interface:

public function getName(): string;

public function getSize(): int;

File class:

Should implement FileSystemEntity interface

Directory class

Should implement FileSystemEntity interface

Should have methods for FS operations:

public function add(FileSystemEntity $fsEntity): void

public function remove(FileSystemEntity $fsEntity): void

public function listContent(): array

### Proxy: Create a class that wraps the c interface from task #1. It should cache the results to readPerson(string $name) and only reach out to the wrapped PersonRepository if no person with a matching name has been read.

### Singleton: Create class named Superman. Since there is only on Superman in world history – make it a singleton.

### Iterator: Create an iterable StringCollection interface with an in-memory and a file implementation. Do not use PHP built-in iterator classes, methods, interfaces.

StringIterator interface:

public function hasNext(): bool;

public function getNext(): ?string;

StringCollection interface:

public function getIterator(): StringIterator;

Create a File implementation for the StringCollection interface

Create an InMemory implementation for the StringCollection interfacePage Break

### Decorator: Create the following decorators for the PersonRepository interface from task #1:

LowerCaseReadPersonDecorator: Both the readPerson and readPeople methods should return Persons with their names converted to lower case.

UppercaseWritePersonDecorator: writePerson should convert a person’s name to uppercase before saving it.

Create a composition with the decorators so every loaded Person will have lowercase names but when they are saved, they will be saved with an uppercase name.

### Visitor: Create an Employee and Company class. Create multiple company reports based on the visitor pattern.

Employee:

private string $name

private int $salary

private string $department

Company:

Has name attribute and holds multiple employees inside them.

Reports:

TotalSallaryReport: Report on the sum of employee salaries in the Company.

TotalNumberOfEmployeesReport: Report on the total number of employees for a Company.

AvarageSallaryReport: Report on the average employee salary in the Company.

NumberOfEmployeeperDepartmentReport: Report that summarizes the number of employees per department.

### Strategy: Create an EmployeeCollection class that holds multiple employees and can be ordered in multiple ways.

Required orderings:

Department name ascending and descending

Name ascending and descending

Salary ascending and descending
