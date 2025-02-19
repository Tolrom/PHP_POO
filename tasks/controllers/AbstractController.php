<?php
include "./models/AbstractModel.php";
include "./views/ViewInterface.php";
abstract class AbstractController {
    //! Properties 

    /**
     * Models list
     * @var ?AbstractModel[] $listModels 
     */
    private ?array $listModels;
    /**
     * Views list
     * @var ?ViewInterface[] $listViews 
     */
    private ?array $listViews;

    //! Constructor
    public function __construct(?array $listModels, ?array $listViews) {
        $this->listModels = $listModels;
        $this->listViews = $listViews;
    }

    //! Getters & Setters

    /**
     * Get the value of listViews
     *
     * @return ViewInterface[]
     */
    public function getListViews(): array {
        return $this->listViews;
    }

    /**
     * Set the value of listViews
     *
     * @param ViewInterface[] $listViews
     *
     * @return self
     */
    public function setListViews(array $listViews): self {
        $this->listViews = $listViews;
        return $this;
    }

    /**
     * Get the value of listModels
     *
     * @return AbstractModel[]
     */
    public function getListModels(): array {
        return $this->listModels;
    }

    /**
     * Set the value of listModels
     *
     * @param AbstractModel[] $listModels
     *
     * @return self
     */
    public function setListModels(array $listModels): self {
        $this->listModels = $listModels;
        return $this;
    }

    //! Methods

    abstract public function render(): void;

    public function renderHeader(): void {
        $header = $this->getListViews()['header']->displayView();
        echo $header;
    }
    public function renderFooter(): void {
        $footer = $this->getListViews()['footer']->displayView();
        echo $footer;
    }
}