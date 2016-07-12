# Prioritised Date Ranges

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PurpleBooth/PrioritisedDateRanges/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PurpleBooth/PrioritisedDateRanges/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/PurpleBooth/PrioritisedDateRanges/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/PurpleBooth/PrioritisedDateRanges/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/PurpleBooth/PrioritisedDateRanges/badges/build.png?b=master)](https://scrutinizer-ci.com/g/PurpleBooth/PrioritisedDateRanges/build-status/master)

This is a PHP library that helps you take multiple date ranges, and combine them into a single range depending decided
on by a priority.

For example

Given we have three ranges of priority 1, 2 and 3, where each repetition represents any period of time.

```
111 11111
 2222
   3333   333
```

This library can help you combine them to form

```
111211111 333
```

## Getting Started

TODO

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull
requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the
[tags on this repository](https://github.com/purplebooth/prioritiseddateranges/tags).

## Authors

See the list of [contributors](https://github.com/purplebooth/prioritiseddateranges/contributors) who participated in
this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
