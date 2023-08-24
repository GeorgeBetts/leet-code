<?php

/**
 * Solution for 68. Text Justification
 * Given an array of strings words and a width maxWidth, format the text
 * such that each line has exactly maxWidth characters and is fully (left and right) justified.
 */
class Solution
{

    /**
     * @param String[] $words
     * @param Integer $maxWidth
     * @return String[]
     */
    public function fullJustify($words, $maxWidth)
    {
        $lines  = [];
        $lineNo = 0;
        $lineLen = 0;
        $wordCount = count($words);
        for ($i = 0; $i < $wordCount; $i++) {
            $wordLen = strlen($words[$i]);
            if ($lineLen == 0) {
                $lines[$lineNo] = [$words[$i]];
                $lineLen = $wordLen + 1;
            } elseif ($lineLen + strlen($words[$i]) <= $maxWidth) {
                $lines[$lineNo][] = $words[$i];
                $lineLen += $wordLen + 1;
            } else {
                $lines[$lineNo] =
                    $this->addSpacesToLine($lines[$lineNo], $lineLen, $maxWidth, count($lines[$lineNo]) > 1);
                $lineNo += 1;
                $lines[$lineNo] = [$words[$i]];
                $lineLen = $wordLen + 1;
            }
        }

        $lines[$lineNo] = $this->addSpacesToLine($lines[$lineNo], $lineLen, $maxWidth, false);

        return $lines;
    }

    /**
     * Adds justification spacing to a line
     *
     * @param String[] $line
     * @param Int $lineLen
     * @param Int $width Required length of the string i.e. width of the line
     * @param Bool $justified Justify text or left align
     * @return String
     */
    public function addSpacesToLine($line, $lineLen, $width, $justified)
    {
        $result = "";
        $wordCount = count($line);
        $lineLen = $lineLen - $wordCount;
        // total words length - $width / word count = spaces between each word
        $spaces = $wordCount > 1 ? ($width - $lineLen) / ($wordCount - 1) : 0;
        $spaceStr = "";
        if ($justified) {
            for ($i = 0; $i < $spaces; $i++) {
                $spaceStr .= " ";
            }
        }
        // length remainder is the number of gaps we need to remove a space from
        $remainder = ((($wordCount - 1) * strlen($spaceStr)) + $lineLen) % $width;
        // build string backwards as gaps are removed from the right
        if ($justified) {
            for ($i = $wordCount - 1; $i >= 0; $i--) {
                if ($i == 0) {
                    $result = $line[$i] . $result;
                    break;
                }
                $result = ($remainder > 0 ? substr($spaceStr, 0, -1) : $spaceStr) . $line[$i] . $result;
                if ($remainder > 0) {
                    $remainder--;
                }
            }
        } else {
            for ($i = 0; $i < $wordCount; $i++) {
                $result .= $line[$i];
                if ($i != $wordCount - 1) {
                    $result .= $spaceStr;
                    $result .= " ";
                }
            }
        }

        // spaces for left justification
        if ($justified == false) {
            $leftSpaces = $width - (($wordCount - 1) + $lineLen);
            for ($i = 0; $i < $leftSpaces; $i++) {
                $result .= " ";
            }
        }

        return $result;
    }
}
