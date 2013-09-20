<?php

/**
 * Class Content
 *
 * @author abachar
 */
class Content
{
    public $xmlData;
    public $personalCard;
    public $projects;
    public $articles;
    public $experiences;
    public $competences;
    public $studies;
    public $languages;
    public $interests;

    public function load($file)
    {
        // Load xml data
        $this->xmlData = simplexml_load_file($file);

        // Personal card
        $this->loadPersonalCard();
        $this->loadArticles();
        $this->loadProjects();
        $this->loadExperiences();
        $this->loadCompetences();
        $this->loadStudies();
        $this->loadLanguages();
        $this->loadInterests();
    }

    private function loadPersonalCard()
    {
        $this->personalCard = (object)array(
            "firstName" => (string)$this->xmlData->personalcard->firstname,
            "lastName" => (string)$this->xmlData->personalcard->lastname,
            "mobile" => (string)$this->xmlData->personalcard->mobile,
            "emails" => $this->loadArrayString($this->xmlData->personalcard->emails->email),
            "address" => (string)$this->xmlData->personalcard->address,
            "birthday" => (string)$this->xmlData->personalcard->birthday,
            "age" => $this->getDuration((string)$this->xmlData->personalcard->birthday, null, false),
            "civil" => (string)$this->xmlData->personalcard->civil,
            "job" => (string)$this->xmlData->personalcard->job,
            "jobExt" => (string)$this->xmlData->personalcard->jobext,
            "facebook" => (string)$this->xmlData->personalcard->facebook,
            "linkedin" => (string)$this->xmlData->personalcard->linkedin,
            "viadeo" => (string)$this->xmlData->personalcard->viadeo,
            "about" => (string)$this->xmlData->personalcard->about
        );
    }

    private function loadArticles()
    {
        $this->articles = array();
        foreach ($this->xmlData->articles->article as $article) {
            $this->articles[(string)$article->code] = (object)array(
                "code" => (string)$article->code,
                "date" => $this->parseDate((string)$article->date),
                "author" => (string)$article->author,
                "title" => (string)$article->title,
                "description" => (string)$article->description,
                "printable" => ((string)$article->printable) === "true",
                "draft" => ((string)$article->draft) === "true"
            );
        }
    }

    private function loadProjects()
    {
        $this->projects = array();
        foreach ($this->xmlData->projects->project as $project) {
            $this->projects[(string)$project->code] = (object)array(
                "code" => (string)$project->code,
                "name" => (string)$project->name,
                "description" => (string)$project->description,
                "tools" => $this->loadArrayString($project->tools->tool),
                "images" => $this->loadArrayString($project->images->image)
            );
        }
    }


    private function loadExperiences()
    {
        $this->experiences = array();
        foreach ($this->xmlData->experiences->experience as $experience) {
            $this->experiences[] = (object)array(
                "start" => $this->parseDate((string)$experience->start),
                "end" => isset($experience->end) ? $this->parseDate((string)$experience->end) : null,
                "duration" => $this->getDuration((string)$experience->start, isset($experience->end) ? (string)$experience->end : null),
                "name" => (string)$experience->name,
                "description" => (string)$experience->description,
                "employer" => (string)$experience->employer,
                "job" => (string)$experience->job,
                "roles" => $this->loadArrayString($experience->roles->role),
                "tools" => $this->loadArrayString($experience->tools->tool),
                "methods" => $this->loadArrayString($experience->methods->method)
            );
        }
    }

    private function loadCompetences()
    {
        $this->competences = array();
        foreach ($this->xmlData->competences->groups->group as $group) {
            $this->competences[(string)$group->name] = (object)array(
                "name" => (string)$group->name,
                "skills" => $this->loadSkills($group->skills->skill)
            );
        }
    }

    private function loadSkills($xmlSkills)
    {
        $skills = array();
        foreach ($xmlSkills as $xmlSkill) {
            $skills[] = (object)array(
                "name" => (string)$xmlSkill->name,
                "level" => isset($xmlSkill->level) ? (string)$xmlSkill->level : null
            );
        }

        return $skills;
    }

    private function loadStudies()
    {
        $this->studies = array();
        foreach ($this->xmlData->studies->study as $study) {
            $this->studies[] = (object)array(
                "date" => (string)$study->date,
                "description" => (string)$study->description,
                "grade" => isset($study->grade) ? (string)$study->grade : null,
            );
        }
    }

    private function loadLanguages()
    {
        $this->languages = array();
        foreach ($this->xmlData->languages->language as $language) {
            $this->languages[] = (object)array(
                "name" => (string)$language->name,
                "level" => (string)$language->level,
            );
        }
    }

    private function loadInterests()
    {
        $this->interests = array();
        foreach ($this->xmlData->interests->interest as $interest) {
            $this->interests[] = (object)array(
                "title" => (string)$interest->title,
                "detail" => (string)$interest->detail,
            );
        }
    }

    private function loadArrayString($xmlItems)
    {
        if (!empty($xmlItems)) {
            $array = array();
            foreach ($xmlItems as $item) {
                $array[] = (string)$item;
            }

            return $array;
        }

        return null;
    }

    private function getDuration($start, $end = null, $showMonths = true)
    {
        $duration = '';

        if ($end === null) {
            $end = date("d/m/Y");
        }

        list($sd, $sm, $sy) = explode('/', $start);
        list($ed, $em, $ey) = explode('/', $end);

        // Year count
        $y = $ey - $sy;
        if ($em < $sm) {
            $y--;
        } elseif (($sm == $em) && ($ed < $sd)) {
            $y--;
        }

        if ($y == 0) {

            // Months
            if ($showMonths) {
                $m = abs($em - $sm + 1);
                if ($m == 1) {
                    $duration .= "Un mois";
                } else if ($m > 1) {
                    $duration .= "{$m} mois";
                }
            }
        } else {

            // Years
            if ($y == 1) {
                $duration .= "Un an";
            } else {
                $duration .= "{$y} ans";
            }

            // Months
            if ($showMonths) {
                $m = $em - $sm + 1;
                $m = abs($m);
                if ($m == 1) {
                    $duration .= " et un mois";
                } else if ($m > 1) {
                    $duration .= " et {$m} mois";
                }
            }
        }

        return $duration;
    }

    private function parseDate($strDate)
    {
        // It work fine for me
        return strtotime(str_replace('/', '-', $strDate));
    }
}

// Load xml contents file
$content = new Content();
$content->load("{$WEBAPP_PATH}/contents/contents.xml");

