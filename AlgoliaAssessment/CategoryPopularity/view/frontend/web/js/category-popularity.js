require(['algoliaCommon'], () => {
    algolia.registerHook('beforeAutocompleteSources', function(sources, algoliaClient, algoliaBundle)  {
        let source = {
            hitsPerPage: 3,
            label: "Category w/ Products ",
            name: "products",
            options: {
                analyticsTags: "autocomplete",
                clickAnalytics: true,
                distinct: true,
                facets: ['categories.level0, categories.level2'],
                maxValuesPerFacet: 3
            },
            paramName:algoliaClient.initIndex(algoliaConfig.indexName + "_" + 'products'),
            templates: {
                noResults({html}) {
                    return 'No Results';
                },
                header({html, items}) {
                    return 'Category w/ Products';
                },
                item({ item, components, html }) {
                    console.log("Item:", item);
                },
                footer({html, items}) {
                    return "";
                }
            }
        };
        sources.push(source);
        return sources;
    });
    
});