use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Classifiers\KNearestNeighbors;

$dataset = Labeled::fromIterator(new CSV('dataset.csv'));

[$training, $testing] = $dataset->stratifiedSplit(0.8);

$estimator = new KNearestNeighbors(3);

$estimator->train($training);

$predictions = $estimator->predict($testing);